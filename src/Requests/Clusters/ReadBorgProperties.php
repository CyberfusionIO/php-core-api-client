<?php

namespace Cyberfusion\CoreApi\Requests\Clusters;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\ClusterBorgPropertiesResource;
use JsonException;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class ReadBorgProperties extends Request implements CoreApiRequestContract
{
    protected Method $method = Method::GET;

    public function __construct(
        private readonly int $id,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return sprintf('/api/v1/clusters/%d/properties/borg', $this->id);
    }

    /**
     * @throws JsonException
     * @returns ClusterBorgPropertiesResource
     */
    public function createDtoFromResponse(Response $response): ClusterBorgPropertiesResource
    {
        return ClusterBorgPropertiesResource::fromArray($response->json());
    }
}
