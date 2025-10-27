<?php

namespace Cyberfusion\CoreApi\Requests\Clusters;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\ClusterGrafanaPropertiesCreateRequest;
use Cyberfusion\CoreApi\Models\ClusterGrafanaPropertiesResource;
use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class CreateGrafanaProperties extends Request implements CoreApiRequestContract, HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        private readonly int $id,
        private readonly ClusterGrafanaPropertiesCreateRequest $clusterGrafanaPropertiesCreateRequest,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return sprintf('/api/v1/clusters/%d/properties/grafana', $this->id);
    }

    public function defaultBody(): array
    {
        return $this->clusterGrafanaPropertiesCreateRequest->toArray();
    }

    /**
     * @throws JsonException
     * @returns ClusterGrafanaPropertiesResource
     */
    public function createDtoFromResponse(Response $response): ClusterGrafanaPropertiesResource
    {
        return ClusterGrafanaPropertiesResource::fromArray($response->json());
    }
}
