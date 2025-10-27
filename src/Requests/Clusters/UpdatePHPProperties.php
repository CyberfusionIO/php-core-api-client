<?php

namespace Cyberfusion\CoreApi\Requests\Clusters;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\ClusterPhpPropertiesResource;
use Cyberfusion\CoreApi\Models\ClusterPhpPropertiesUpdateRequest;
use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class UpdatePHPProperties extends Request implements CoreApiRequestContract, HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PATCH;

    public function __construct(
        private readonly int $id,
        private readonly ClusterPhpPropertiesUpdateRequest $clusterPhpPropertiesUpdateRequest,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return sprintf('/api/v1/clusters/%d/properties/php', $this->id);
    }

    public function defaultBody(): array
    {
        return $this->clusterPhpPropertiesUpdateRequest->toArray();
    }

    /**
     * @throws JsonException
     * @returns ClusterPhpPropertiesResource
     */
    public function createDtoFromResponse(Response $response): ClusterPhpPropertiesResource
    {
        return ClusterPhpPropertiesResource::fromArray($response->json());
    }
}
