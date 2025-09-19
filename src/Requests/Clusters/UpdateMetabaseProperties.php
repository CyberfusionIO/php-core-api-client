<?php

namespace Cyberfusion\CoreApi\Requests\Clusters;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\ClusterMetabasePropertiesResource;
use Cyberfusion\CoreApi\Models\ClusterMetabasePropertiesUpdateRequest;
use Cyberfusion\CoreApi\Support\UrlBuilder;
use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class UpdateMetabaseProperties extends Request implements CoreApiRequestContract, HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PATCH;

    public function __construct(
        private readonly int $id,
        private readonly ClusterMetabasePropertiesUpdateRequest $clusterMetabasePropertiesUpdateRequest,
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
        return $this->clusterMetabasePropertiesUpdateRequest->toArray();
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
