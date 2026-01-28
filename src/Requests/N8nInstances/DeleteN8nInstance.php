<?php

namespace Cyberfusion\CoreApi\Requests\N8nInstances;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\DetailMessage;
use JsonException;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class DeleteN8nInstance extends Request implements CoreApiRequestContract
{
    protected Method $method = Method::DELETE;

    public function __construct(
        private readonly int $id,
        private readonly ?bool $deleteOnCluster = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return sprintf('/api/v1/n8n-instances/%d', $this->id);
    }

    protected function defaultQuery(): array
    {
        $parameters = [];
        $parameters['delete_on_cluster'] = $this->deleteOnCluster;

        return array_filter($parameters);
    }

    /**
     * @throws JsonException
     * @returns DetailMessage
     */
    public function createDtoFromResponse(Response $response): DetailMessage
    {
        return DetailMessage::fromArray($response->json());
    }
}
