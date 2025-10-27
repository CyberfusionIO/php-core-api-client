<?php

namespace Cyberfusion\CoreApi\Requests\Clusters;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\ClusterMariadbPropertiesResource;
use JsonException;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class ReadMariaDBProperties extends Request implements CoreApiRequestContract
{
    protected Method $method = Method::GET;

    public function __construct(
        private readonly int $id,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return sprintf('/api/v1/clusters/%d/properties/mariadb', $this->id);
    }

    /**
     * @throws JsonException
     * @returns ClusterMariadbPropertiesResource
     */
    public function createDtoFromResponse(Response $response): ClusterMariadbPropertiesResource
    {
        return ClusterMariadbPropertiesResource::fromArray($response->json());
    }
}
