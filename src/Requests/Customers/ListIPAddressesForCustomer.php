<?php

namespace Cyberfusion\CoreApi\Requests\Customers;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\CustomerIPAddresses;
use Cyberfusion\CoreApi\Support\UrlBuilder;
use JsonException;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

/**
 * Use this endpoint to get customer-specific IP addresses. Most notably, this endpoint returns the IP addresses for the Internet Routers (service account) that the specified customer uses. These IP addresses are used for outbound connections, and therefore should be whitelisted at e.g. external APIs that use IP whitelisting. If the customer does not have dedicated IP addresses (see the 'Create Customer IP Address' endpoint), default IP addresses are used.
 */
class ListIPAddressesForCustomer extends Request implements CoreApiRequestContract
{
    protected Method $method = Method::GET;

    public function __construct(
        private readonly int $id,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return UrlBuilder::for('/api/v1/customers/%d/ip-addresses')
            ->addPathParameter($this->id)
            ->getEndpoint();
    }

    /**
     * @throws JsonException
     * @returns CustomerIPAddresses
     */
    public function createDtoFromResponse(Response $response): CustomerIPAddresses
    {
        return CustomerIPAddresses::fromArray($response->json());
    }
}
