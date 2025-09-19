<?php

namespace Cyberfusion\CoreApi\Requests\Clusters;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\ClusterRabbitmqPropertiesResource;
use Cyberfusion\CoreApi\Support\UrlBuilder;
use JsonException;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class ReadRabbitMQProperties extends Request implements CoreApiRequestContract
{
    protected Method $method = Method::GET;

    public function __construct(
        private readonly int $id,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return UrlBuilder::for('/api/v1/clusters/%d/properties/rabbitmq')
            ->addPathParameter($this->id)
            ->getEndpoint();
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
