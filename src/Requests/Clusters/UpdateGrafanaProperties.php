<?php

namespace Cyberfusion\CoreApi\Requests\Clusters;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\ClusterGrafanaPropertiesResource;
use Cyberfusion\CoreApi\Models\ClusterGrafanaPropertiesUpdateRequest;
use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class UpdateGrafanaProperties extends Request implements CoreApiRequestContract, HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PATCH;

    public function __construct(
        private readonly int $id,
        private readonly ClusterGrafanaPropertiesUpdateRequest $clusterGrafanaPropertiesUpdateRequest,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return sprintf('/api/v1/clusters/%d/properties/grafana', $this->id);
    }

    public function defaultBody(): array
    {
        return $this->clusterGrafanaPropertiesUpdateRequest->toArray();
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
