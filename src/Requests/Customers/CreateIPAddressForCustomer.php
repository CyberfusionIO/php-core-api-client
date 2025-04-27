<?php

namespace Cyberfusion\CoreApi\Requests\Customers;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\CustomerIPAddressCreateRequest;
use Cyberfusion\CoreApi\Models\TaskCollectionResource;
use Cyberfusion\CoreApi\Support\UrlBuilder;
use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Use this endpoint to create a dedicated IP address for outbound traffic from all clusters belonging to a certain Cyberfusion customer. Dedicated IP addresses are often used to circumvent external suppliers' API ratelimits; those could be reached when multiple Cyberfusion customers use the same API from one of our shared/default IP addresses. If the customer does not have dedicated IP addresses, default IP addresses are used. Only request IPv4 addresses when absolutely necessary; they are scarce. > ⚠️ Calling this endpoint incurs charges. Retrieve these with `GET /api/v1/customers/ip-addresses/products`.
 */
class CreateIPAddressForCustomer extends Request implements CoreApiRequestContract, HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        private readonly int $id,
        private readonly CustomerIPAddressCreateRequest $customerIPAddressCreateRequest,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return UrlBuilder::for('/api/v1/customers/%d/ip-addresses')
            ->addPathParameter($this->id)
            ->getEndpoint();
    }

    public function defaultBody(): array
    {
        return $this->customerIPAddressCreateRequest->toArray();
    }

    /**
     * @throws JsonException
     * @returns TaskCollectionResource
     */
    public function createDtoFromResponse(Response $response): TaskCollectionResource
    {
        return TaskCollectionResource::fromArray($response->json());
    }
}
