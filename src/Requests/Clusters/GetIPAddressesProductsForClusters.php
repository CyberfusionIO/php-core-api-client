<?php

namespace Cyberfusion\CoreApi\Requests\Clusters;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\IPAddressProduct;
use Cyberfusion\CoreApi\Support\UrlBuilder;
use Illuminate\Support\Collection;
use JsonException;
use Saloon\Enums\Method;
use Saloon\Http\Response;
use Saloon\Http\SoloRequest;

/**
 * Get products for IP addresses.
 */
class GetIPAddressesProductsForClusters extends SoloRequest implements CoreApiRequestContract
{
    protected Method $method = Method::GET;

    public function __construct(
        private readonly string $baseUrl,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return UrlBuilder::for($this->baseUrl . '/api/v1/clusters/ip-addresses/products')->getEndpoint();
    }

    /**
     * @throws JsonException
     * @returns Collection<IPAddressProduct>
     */
    public function createDtoFromResponse(Response $response): Collection
    {
        return $response->collect()->map(fn (array $item) => IPAddressProduct::fromArray($item));
    }
}
