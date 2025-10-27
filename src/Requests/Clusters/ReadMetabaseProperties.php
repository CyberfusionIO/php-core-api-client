<?php

namespace Cyberfusion\CoreApi\Requests\Clusters;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\ClusterMetabasePropertiesResource;
use JsonException;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class ReadMetabaseProperties extends Request implements CoreApiRequestContract
{
    protected Method $method = Method::GET;

    public function __construct(
        private readonly int $id,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return sprintf('/api/v1/clusters/%d/properties/metabase', $this->id);
    }

    /**
     * @throws JsonException
     * @returns ClusterMetabasePropertiesResource
     */
    public function createDtoFromResponse(Response $response): ClusterMetabasePropertiesResource
    {
        return ClusterMetabasePropertiesResource::fromArray($response->json());
    }
}
