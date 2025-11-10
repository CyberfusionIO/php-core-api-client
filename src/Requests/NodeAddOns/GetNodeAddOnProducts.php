<?php

namespace Cyberfusion\CoreApi\Requests\NodeAddOns;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\CoreApiUnauthenticated;
use Cyberfusion\CoreApi\Models\NodeAddOnProduct;
use Illuminate\Support\Collection;
use JsonException;
use Saloon\Contracts\Authenticator;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

/**
 * Get products for node add-ons.
 */
class GetNodeAddOnProducts extends Request implements CoreApiRequestContract
{
    protected Method $method = Method::GET;

    public function __construct()
    {
    }

    public function resolveEndpoint(): string
    {
        return '/api/v1/node-add-ons/products';
    }

    public function defaultAuth(): ?Authenticator
    {
        return new CoreApiUnauthenticated();
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
