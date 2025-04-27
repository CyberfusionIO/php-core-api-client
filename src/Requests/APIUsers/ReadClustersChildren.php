<?php

namespace Cyberfusion\CoreApi\Requests\APIUsers;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\ClusterChildren;
use Cyberfusion\CoreApi\Support\UrlBuilder;
use JsonException;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

/**
 * Get all children objects of clusters that API user has access to by API user to cluster grants.
 */
class ReadClustersChildren extends Request implements CoreApiRequestContract
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return UrlBuilder::for('/api/v1/api-users/clusters-children')->getEndpoint();
    }

    /**
     * @throws JsonException
     * @returns ClusterChildren
     */
    public function createDtoFromResponse(Response $response): ClusterChildren
    {
        return ClusterChildren::fromArray($response->json());
    }
}
