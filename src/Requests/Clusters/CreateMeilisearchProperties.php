<?php

namespace Cyberfusion\CoreApi\Requests\Clusters;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\ClusterMeilisearchPropertiesCreateRequest;
use Cyberfusion\CoreApi\Models\ClusterMeilisearchPropertiesResource;
use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class CreateMeilisearchProperties extends Request implements CoreApiRequestContract, HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        private readonly int $id,
        private readonly ClusterMeilisearchPropertiesCreateRequest $clusterMeilisearchPropertiesCreateRequest,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return sprintf('/api/v1/clusters/%d/properties/meilisearch', $this->id);
    }

    public function defaultBody(): array
    {
        return $this->clusterMeilisearchPropertiesCreateRequest->toArray();
    }

    /**
     * @throws JsonException
     * @returns ClusterMeilisearchPropertiesResource
     */
    public function createDtoFromResponse(Response $response): ClusterMeilisearchPropertiesResource
    {
        return ClusterMeilisearchPropertiesResource::fromArray($response->json());
    }
}
