<?php

namespace Cyberfusion\CoreApi\Requests\Clusters;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\ClusterBorgPropertiesCreateRequest;
use Cyberfusion\CoreApi\Models\ClusterBorgPropertiesResource;
use Cyberfusion\CoreApi\Support\UrlBuilder;
use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class CreateBorgProperties extends Request implements CoreApiRequestContract, HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        private readonly int $id,
        private readonly ClusterBorgPropertiesCreateRequest $clusterBorgPropertiesCreateRequest,
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
        return $this->clusterBorgPropertiesCreateRequest->toArray();
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
