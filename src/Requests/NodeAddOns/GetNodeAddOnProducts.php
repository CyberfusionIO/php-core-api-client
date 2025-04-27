<?php

namespace Cyberfusion\CoreApi\Requests\NodeAddOns;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\NodeAddOnProduct;
use Cyberfusion\CoreApi\Support\UrlBuilder;
use Illuminate\Support\Collection;
use JsonException;
use Saloon\Enums\Method;
use Saloon\Http\Response;
use Saloon\Http\SoloRequest;

/**
 * Get products for node add-ons.
 */
class GetNodeAddOnProducts extends SoloRequest implements CoreApiRequestContract
{
    protected Method $method = Method::GET;

    public function __construct(
        private readonly string $baseUrl,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return UrlBuilder::for($this->baseUrl . '/api/v1/node-add-ons/products')->getEndpoint();
    }

    /**
     * @throws JsonException
     * @returns Collection<NodeAddOnProduct>
     */
    public function createDtoFromResponse(Response $response): Collection
    {
        return $response->collect()->map(fn (array $item) => NodeAddOnProduct::fromArray($item));
    }
}
