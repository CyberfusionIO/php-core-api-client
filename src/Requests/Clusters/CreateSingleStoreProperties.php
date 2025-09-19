<?php

namespace Cyberfusion\CoreApi\Requests\Clusters;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\ClusterSinglestorePropertiesCreateRequest;
use Cyberfusion\CoreApi\Models\ClusterSinglestorePropertiesResource;
use Cyberfusion\CoreApi\Support\UrlBuilder;
use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class CreateSingleStoreProperties extends Request implements CoreApiRequestContract, HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        private readonly int $id,
        private readonly ClusterSinglestorePropertiesCreateRequest $clusterSinglestorePropertiesCreateRequest,
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
        return $this->clusterSinglestorePropertiesCreateRequest->toArray();
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
