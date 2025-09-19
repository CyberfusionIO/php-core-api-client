<?php

namespace Cyberfusion\CoreApi\Requests\Clusters;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\ClusterElasticsearchPropertiesCreateRequest;
use Cyberfusion\CoreApi\Models\ClusterElasticsearchPropertiesResource;
use Cyberfusion\CoreApi\Support\UrlBuilder;
use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class CreateElasticsearchProperties extends Request implements CoreApiRequestContract, HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        private readonly int $id,
        private readonly ClusterElasticsearchPropertiesCreateRequest $clusterElasticsearchPropertiesCreateRequest,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return UrlBuilder::for('/api/v1/clusters/%d/properties/elasticsearch')
            ->addPathParameter($this->id)
            ->getEndpoint();
    }

    public function defaultBody(): array
    {
        return $this->clusterElasticsearchPropertiesCreateRequest->toArray();
    }

    /**
     * @throws JsonException
     * @returns ClusterElasticsearchPropertiesResource
     */
    public function createDtoFromResponse(Response $response): ClusterElasticsearchPropertiesResource
    {
        return ClusterElasticsearchPropertiesResource::fromArray($response->json());
    }
}
