<?php

namespace Cyberfusion\CoreApi\Requests\Customers;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\TaskCollectionResource;
use JsonException;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class DeleteIPAddressForCustomer extends Request implements CoreApiRequestContract
{
    protected Method $method = Method::DELETE;

    public function __construct(
        private readonly int $id,
        private readonly string $ipAddress,
        private readonly ?string $callbackUrl = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return sprintf('/api/v1/customers/%d/ip-addresses/%s', $this->id, $this->ipAddress);
    }

    protected function defaultQuery(): array
    {
        $parameters = [];
        $parameters['callback_url'] = $this->callbackUrl;

        return array_filter($parameters);
    }

    /**
     * @throws JsonException
     * @returns TaskCollectionResource
     */
    public function createDtoFromResponse(Response $response): TaskCollectionResource
    {
        return TaskCollectionResource::fromArray($response->json());
    }
}
