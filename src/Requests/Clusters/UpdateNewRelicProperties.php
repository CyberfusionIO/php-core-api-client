<?php

namespace Cyberfusion\CoreApi\Requests\Clusters;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\ClusterNewRelicPropertiesResource;
use Cyberfusion\CoreApi\Models\ClusterNewRelicPropertiesUpdateRequest;
use Cyberfusion\CoreApi\Support\UrlBuilder;
use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class UpdateNewRelicProperties extends Request implements CoreApiRequestContract, HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PATCH;

    public function __construct(
        private readonly int $id,
        private readonly ClusterNewRelicPropertiesUpdateRequest $clusterNewRelicPropertiesUpdateRequest,
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
        return $this->clusterNewRelicPropertiesUpdateRequest->toArray();
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
