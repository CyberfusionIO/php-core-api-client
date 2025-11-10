<?php

namespace Cyberfusion\CoreApi\Requests\Customers;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\CustomerIpAddressCreateRequest;
use Cyberfusion\CoreApi\Models\TaskCollectionResource;
use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Use this endpoint to create a dedicated IP address for outbound traffic from all clusters belonging to a certain Cyberfusion customer. Dedicated IP addresses are often used to circumvent external suppliers' API ratelimits; those could be reached when multiple Cyberfusion customers use the same API from one of our shared/default IP addresses. If the customer does not have dedicated IP addresses, default IP addresses are used. Only request IPv4 addresses when absolutely necessary; they are scarce. > ⚠️ Calling this endpoint incurs charges. Retrieve these with `GET /api/v1/customers/ip-addresses/products`.
 */
class CreateIpAddressForCustomer extends Request implements CoreApiRequestContract, HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        private readonly int $id,
        private readonly CustomerIpAddressCreateRequest $customerIpAddressCreateRequest,
        private readonly ?string $callbackUrl = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return sprintf('/api/v1/customers/%d/ip-addresses', $this->id);
    }

    protected function defaultQuery(): array
    {
        $parameters = [];
        $parameters['callback_url'] = $this->callbackUrl;

        return array_filter($parameters);
    }

    public function defaultBody(): array
    {
        return $this->customerIpAddressCreateRequest->toArray();
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
