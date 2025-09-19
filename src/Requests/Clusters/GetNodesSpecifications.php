<?php

namespace Cyberfusion\CoreApi\Requests\Clusters;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\NodeSpecificationsResource;
use Cyberfusion\CoreApi\Support\UrlBuilder;
use Illuminate\Support\Collection;
use JsonException;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

/**
 * Get specifications of nodes. Use this endpoint to determine the specifications that nodes have, including all node add-ons.
 */
class GetNodesSpecifications extends Request implements CoreApiRequestContract
{
    protected Method $method = Method::GET;

    public function __construct(
        private readonly int $id,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return UrlBuilder::for('/api/v1/clusters/%d/nodes-specifications')
            ->addPathParameter($this->id)
            ->getEndpoint();
    }

    /**
     * @throws JsonException
     * @returns Collection<NodeSpecificationsResource>
     */
    public function createDtoFromResponse(Response $response): Collection
    {
        return $response->collect()->map(fn (array $item) => NodeSpecificationsResource::fromArray($item));
    }
}
