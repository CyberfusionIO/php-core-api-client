<?php

namespace Cyberfusion\CoreApi\Requests\Clusters;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\ClusterUnixUsersPropertiesResource;
use JsonException;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class ReadUNIXUsersProperties extends Request implements CoreApiRequestContract
{
    protected Method $method = Method::GET;

    public function __construct(
        private readonly int $id,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return sprintf('/api/v1/clusters/%d/properties/unix-users', $this->id);
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
