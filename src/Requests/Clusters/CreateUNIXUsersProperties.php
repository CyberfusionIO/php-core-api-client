<?php

namespace Cyberfusion\CoreApi\Requests\Clusters;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\ClusterUnixUsersPropertiesCreateRequest;
use Cyberfusion\CoreApi\Models\ClusterUnixUsersPropertiesResource;
use Cyberfusion\CoreApi\Support\UrlBuilder;
use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class CreateUNIXUsersProperties extends Request implements CoreApiRequestContract, HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        private readonly int $id,
        private readonly ClusterUnixUsersPropertiesCreateRequest $clusterUnixUsersPropertiesCreateRequest,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return UrlBuilder::for('/api/v1/clusters/%d/properties/unix-users')
            ->addPathParameter($this->id)
            ->getEndpoint();
    }

    public function defaultBody(): array
    {
        return $this->clusterUnixUsersPropertiesCreateRequest->toArray();
    }

    /**
     * @throws JsonException
     * @returns ClusterUnixUsersPropertiesResource
     */
    public function createDtoFromResponse(Response $response): ClusterUnixUsersPropertiesResource
    {
        return ClusterUnixUsersPropertiesResource::fromArray($response->json());
    }
}
