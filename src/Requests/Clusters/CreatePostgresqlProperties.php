<?php

namespace Cyberfusion\CoreApi\Requests\Clusters;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\ClusterPostgresqlPropertiesCreateRequest;
use Cyberfusion\CoreApi\Models\ClusterPostgresqlPropertiesResource;
use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class CreatePostgresqlProperties extends Request implements CoreApiRequestContract, HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        private readonly int $id,
        private readonly ClusterPostgresqlPropertiesCreateRequest $clusterPostgresqlPropertiesCreateRequest,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return sprintf('/api/v1/clusters/%d/properties/postgresql', $this->id);
    }

    public function defaultBody(): array
    {
        return $this->clusterPostgresqlPropertiesCreateRequest->toArray();
    }

    /**
     * @throws JsonException
     * @returns ClusterPostgresqlPropertiesResource
     */
    public function createDtoFromResponse(Response $response): ClusterPostgresqlPropertiesResource
    {
        return ClusterPostgresqlPropertiesResource::fromArray($response->json());
    }
}
