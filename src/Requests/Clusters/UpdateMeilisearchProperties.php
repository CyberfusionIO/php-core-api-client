<?php

namespace Cyberfusion\CoreApi\Requests\Clusters;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\ClusterMeilisearchPropertiesResource;
use Cyberfusion\CoreApi\Models\ClusterMeilisearchPropertiesUpdateRequest;
use Cyberfusion\CoreApi\Support\UrlBuilder;
use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class UpdateMeilisearchProperties extends Request implements CoreApiRequestContract, HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PATCH;

    public function __construct(
        private readonly int $id,
        private readonly ClusterMeilisearchPropertiesUpdateRequest $clusterMeilisearchPropertiesUpdateRequest,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return UrlBuilder::for('/api/v1/clusters/%d/properties/meilisearch')
            ->addPathParameter($this->id)
            ->getEndpoint();
    }

    public function defaultBody(): array
    {
        return $this->clusterMeilisearchPropertiesUpdateRequest->toArray();
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
