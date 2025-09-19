<?php

namespace Cyberfusion\CoreApi\Requests\Clusters;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\ClusterCreateRequest;
use Cyberfusion\CoreApi\Models\TaskCollectionResource;
use Cyberfusion\CoreApi\Support\UrlBuilder;
use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class CreateCluster extends Request implements CoreApiRequestContract, HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        private readonly ClusterCreateRequest $clusterCreateRequest,
        private readonly ?string $callbackUrl = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return UrlBuilder::for('/api/v1/clusters')
            ->addQueryParameter('callback_url', $this->callbackUrl)
            ->getEndpoint();
    }

    public function defaultBody(): array
    {
        return $this->clusterCreateRequest->toArray();
    }

    /**
     * @throws JsonException
     * @returns TaskCollectionResource
     */
    public function createDtoFromResponse(Response $response): TaskCollectionResource
    {
        return TaskCollectionResource::fromArray($response->json());
    }
}
