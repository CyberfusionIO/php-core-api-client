<?php

namespace Cyberfusion\CoreApi\Requests\Clusters;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\ClusterPostgresqlPropertiesResource;
use Cyberfusion\CoreApi\Support\UrlBuilder;
use JsonException;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class ReadPostgreSQLProperties extends Request implements CoreApiRequestContract
{
    protected Method $method = Method::GET;

    public function __construct(
        private readonly int $id,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return UrlBuilder::for('/api/v1/clusters/%d/properties/postgresql')
            ->addPathParameter($this->id)
            ->getEndpoint();
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
