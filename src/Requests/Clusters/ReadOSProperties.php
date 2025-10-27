<?php

namespace Cyberfusion\CoreApi\Requests\Clusters;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\ClusterOsPropertiesResource;
use JsonException;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class ReadOSProperties extends Request implements CoreApiRequestContract
{
    protected Method $method = Method::GET;

    public function __construct(
        private readonly int $id,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return sprintf('/api/v1/clusters/%d/properties/os', $this->id);
    }

    /**
     * @throws JsonException
     * @returns ClusterOsPropertiesResource
     */
    public function createDtoFromResponse(Response $response): ClusterOsPropertiesResource
    {
        return ClusterOsPropertiesResource::fromArray($response->json());
    }
}
