<?php

namespace Cyberfusion\CoreApi\Requests\APIUsers;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\ClusterChildren;
use Cyberfusion\CoreApi\Models\DetailMessage;
use Cyberfusion\CoreApi\Models\ValidationError;
use Cyberfusion\CoreApi\Support\DtoBuilder;
use Cyberfusion\CoreApi\Support\UrlBuilder;
use Illuminate\Support\Collection;
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
     * @returns ClusterChildren|DetailMessage|Collection<ValidationError>
     */
    public function createDtoFromResponse(Response $response): ClusterChildren|DetailMessage|Collection
    {
        return DtoBuilder::for($response, ClusterChildren::class)->build();
    }
}
