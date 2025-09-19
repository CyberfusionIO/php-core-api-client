<?php

namespace Cyberfusion\CoreApi\Requests\Clusters;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\ClusterNodejsPropertiesCreateRequest;
use Cyberfusion\CoreApi\Models\ClusterNodejsPropertiesResource;
use Cyberfusion\CoreApi\Support\UrlBuilder;
use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class CreateNodeJSProperties extends Request implements CoreApiRequestContract, HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        private readonly int $id,
        private readonly ClusterNodejsPropertiesCreateRequest $clusterNodejsPropertiesCreateRequest,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return UrlBuilder::for('/api/v1/clusters/%d/properties/nodejs')
            ->addPathParameter($this->id)
            ->getEndpoint();
    }

    public function defaultBody(): array
    {
        return $this->clusterNodejsPropertiesCreateRequest->toArray();
    }

    /**
     * @throws JsonException
     * @returns ClusterNodejsPropertiesResource
     */
    public function createDtoFromResponse(Response $response): ClusterNodejsPropertiesResource
    {
        return ClusterNodejsPropertiesResource::fromArray($response->json());
    }
}
