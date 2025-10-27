<?php

namespace Cyberfusion\CoreApi\Requests\Clusters;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\ClusterPostgresqlPropertiesResource;
use Cyberfusion\CoreApi\Models\ClusterPostgresqlPropertiesUpdateRequest;
use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class UpdatePostgreSQLProperties extends Request implements CoreApiRequestContract, HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PATCH;

    public function __construct(
        private readonly int $id,
        private readonly ClusterPostgresqlPropertiesUpdateRequest $clusterPostgresqlPropertiesUpdateRequest,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return sprintf('/api/v1/clusters/%d/properties/postgresql', $this->id);
    }

    public function defaultBody(): array
    {
        return $this->clusterPostgresqlPropertiesUpdateRequest->toArray();
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
