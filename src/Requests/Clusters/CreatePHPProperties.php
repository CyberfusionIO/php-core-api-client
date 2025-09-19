<?php

namespace Cyberfusion\CoreApi\Requests\Clusters;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\ClusterPhpPropertiesCreateRequest;
use Cyberfusion\CoreApi\Models\ClusterPhpPropertiesResource;
use Cyberfusion\CoreApi\Support\UrlBuilder;
use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class CreatePHPProperties extends Request implements CoreApiRequestContract, HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        private readonly int $id,
        private readonly ClusterPhpPropertiesCreateRequest $clusterPhpPropertiesCreateRequest,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return UrlBuilder::for('/api/v1/clusters/%d/properties/php')
            ->addPathParameter($this->id)
            ->getEndpoint();
    }

    public function defaultBody(): array
    {
        return $this->clusterPhpPropertiesCreateRequest->toArray();
    }

    /**
     * @throws JsonException
     * @returns ClusterPhpPropertiesResource
     */
    public function createDtoFromResponse(Response $response): ClusterPhpPropertiesResource
    {
        return ClusterPhpPropertiesResource::fromArray($response->json());
    }
}
