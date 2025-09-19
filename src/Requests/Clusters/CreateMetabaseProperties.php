<?php

namespace Cyberfusion\CoreApi\Requests\Clusters;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\ClusterMetabasePropertiesCreateRequest;
use Cyberfusion\CoreApi\Models\ClusterMetabasePropertiesResource;
use Cyberfusion\CoreApi\Support\UrlBuilder;
use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class CreateMetabaseProperties extends Request implements CoreApiRequestContract, HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        private readonly int $id,
        private readonly ClusterMetabasePropertiesCreateRequest $clusterMetabasePropertiesCreateRequest,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return UrlBuilder::for('/api/v1/clusters/%d/properties/metabase')
            ->addPathParameter($this->id)
            ->getEndpoint();
    }

    public function defaultBody(): array
    {
        return $this->clusterMetabasePropertiesCreateRequest->toArray();
    }

    /**
     * @throws JsonException
     * @returns ClusterMetabasePropertiesResource
     */
    public function createDtoFromResponse(Response $response): ClusterMetabasePropertiesResource
    {
        return ClusterMetabasePropertiesResource::fromArray($response->json());
    }
}
