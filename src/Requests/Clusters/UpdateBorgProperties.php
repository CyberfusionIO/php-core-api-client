<?php

namespace Cyberfusion\CoreApi\Requests\Clusters;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\ClusterBorgPropertiesResource;
use Cyberfusion\CoreApi\Models\ClusterBorgPropertiesUpdateRequest;
use Cyberfusion\CoreApi\Support\UrlBuilder;
use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class UpdateBorgProperties extends Request implements CoreApiRequestContract, HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PATCH;

    public function __construct(
        private readonly int $id,
        private readonly ClusterBorgPropertiesUpdateRequest $clusterBorgPropertiesUpdateRequest,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return UrlBuilder::for('/api/v1/clusters/%d/properties/borg')
            ->addPathParameter($this->id)
            ->getEndpoint();
    }

    public function defaultBody(): array
    {
        return $this->clusterBorgPropertiesUpdateRequest->toArray();
    }

    /**
     * @throws JsonException
     * @returns ClusterBorgPropertiesResource
     */
    public function createDtoFromResponse(Response $response): ClusterBorgPropertiesResource
    {
        return ClusterBorgPropertiesResource::fromArray($response->json());
    }
}
