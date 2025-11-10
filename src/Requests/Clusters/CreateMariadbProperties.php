<?php

namespace Cyberfusion\CoreApi\Requests\Clusters;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\ClusterMariadbPropertiesCreateRequest;
use Cyberfusion\CoreApi\Models\ClusterMariadbPropertiesResource;
use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class CreateMariadbProperties extends Request implements CoreApiRequestContract, HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        private readonly int $id,
        private readonly ClusterMariadbPropertiesCreateRequest $clusterMariadbPropertiesCreateRequest,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return sprintf('/api/v1/clusters/%d/properties/mariadb', $this->id);
    }

    public function defaultBody(): array
    {
        return $this->clusterMariadbPropertiesCreateRequest->toArray();
    }

    /**
     * @throws JsonException
     * @returns ClusterMariadbPropertiesResource
     */
    public function createDtoFromResponse(Response $response): ClusterMariadbPropertiesResource
    {
        return ClusterMariadbPropertiesResource::fromArray($response->json());
    }
}
