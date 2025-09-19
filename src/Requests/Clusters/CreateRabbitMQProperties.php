<?php

namespace Cyberfusion\CoreApi\Requests\Clusters;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\ClusterRabbitmqPropertiesCreateRequest;
use Cyberfusion\CoreApi\Models\ClusterRabbitmqPropertiesResource;
use Cyberfusion\CoreApi\Support\UrlBuilder;
use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class CreateRabbitMQProperties extends Request implements CoreApiRequestContract, HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        private readonly int $id,
        private readonly ClusterRabbitmqPropertiesCreateRequest $clusterRabbitmqPropertiesCreateRequest,
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
        return $this->clusterRabbitmqPropertiesCreateRequest->toArray();
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
