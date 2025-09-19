<?php

namespace Cyberfusion\CoreApi\Requests\Clusters;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\ClusterNewRelicPropertiesCreateRequest;
use Cyberfusion\CoreApi\Models\ClusterNewRelicPropertiesResource;
use Cyberfusion\CoreApi\Support\UrlBuilder;
use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class CreateNewRelicProperties extends Request implements CoreApiRequestContract, HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        private readonly int $id,
        private readonly ClusterNewRelicPropertiesCreateRequest $clusterNewRelicPropertiesCreateRequest,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return UrlBuilder::for('/api/v1/clusters/%d/properties/new-relic')
            ->addPathParameter($this->id)
            ->getEndpoint();
    }

    public function defaultBody(): array
    {
        return $this->clusterNewRelicPropertiesCreateRequest->toArray();
    }

    /**
     * @throws JsonException
     * @returns ClusterNewRelicPropertiesResource
     */
    public function createDtoFromResponse(Response $response): ClusterNewRelicPropertiesResource
    {
        return ClusterNewRelicPropertiesResource::fromArray($response->json());
    }
}
