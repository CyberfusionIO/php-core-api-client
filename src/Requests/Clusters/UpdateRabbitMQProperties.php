<?php

namespace Cyberfusion\CoreApi\Requests\Clusters;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\ClusterRabbitmqPropertiesResource;
use Cyberfusion\CoreApi\Models\ClusterRabbitmqPropertiesUpdateRequest;
use Cyberfusion\CoreApi\Support\UrlBuilder;
use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class UpdateRabbitMQProperties extends Request implements CoreApiRequestContract, HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PATCH;

    public function __construct(
        private readonly int $id,
        private readonly ClusterRabbitmqPropertiesUpdateRequest $clusterRabbitmqPropertiesUpdateRequest,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return UrlBuilder::for('/api/v1/clusters/%d/properties/rabbitmq')
            ->addPathParameter($this->id)
            ->getEndpoint();
    }

    public function defaultBody(): array
    {
        return $this->clusterRabbitmqPropertiesUpdateRequest->toArray();
    }

    /**
     * @throws JsonException
     * @returns ClusterRabbitmqPropertiesResource
     */
    public function createDtoFromResponse(Response $response): ClusterRabbitmqPropertiesResource
    {
        return ClusterRabbitmqPropertiesResource::fromArray($response->json());
    }
}
