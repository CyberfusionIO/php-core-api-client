<?php

namespace Cyberfusion\CoreApi\Requests\Clusters;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\ClusterOsPropertiesCreateRequest;
use Cyberfusion\CoreApi\Models\ClusterOsPropertiesResource;
use Cyberfusion\CoreApi\Support\UrlBuilder;
use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class CreateOSProperties extends Request implements CoreApiRequestContract, HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        private readonly int $id,
        private readonly ClusterOsPropertiesCreateRequest $clusterOsPropertiesCreateRequest,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return UrlBuilder::for('/api/v1/clusters/%d/properties/os')
            ->addPathParameter($this->id)
            ->getEndpoint();
    }

    public function defaultBody(): array
    {
        return $this->clusterOsPropertiesCreateRequest->toArray();
    }

    /**
     * @throws JsonException
     * @returns ClusterOsPropertiesResource
     */
    public function createDtoFromResponse(Response $response): ClusterOsPropertiesResource
    {
        return ClusterOsPropertiesResource::fromArray($response->json());
    }
}
