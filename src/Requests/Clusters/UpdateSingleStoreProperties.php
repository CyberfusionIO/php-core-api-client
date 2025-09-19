<?php

namespace Cyberfusion\CoreApi\Requests\Clusters;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\ClusterSinglestorePropertiesResource;
use Cyberfusion\CoreApi\Models\ClusterSinglestorePropertiesUpdateRequest;
use Cyberfusion\CoreApi\Support\UrlBuilder;
use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class UpdateSingleStoreProperties extends Request implements CoreApiRequestContract, HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PATCH;

    public function __construct(
        private readonly int $id,
        private readonly ClusterSinglestorePropertiesUpdateRequest $clusterSinglestorePropertiesUpdateRequest,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return UrlBuilder::for('/api/v1/clusters/%d/properties/singlestore')
            ->addPathParameter($this->id)
            ->getEndpoint();
    }

    public function defaultBody(): array
    {
        return $this->clusterSinglestorePropertiesUpdateRequest->toArray();
    }

    /**
     * @throws JsonException
     * @returns ClusterSinglestorePropertiesResource
     */
    public function createDtoFromResponse(Response $response): ClusterSinglestorePropertiesResource
    {
        return ClusterSinglestorePropertiesResource::fromArray($response->json());
    }
}
