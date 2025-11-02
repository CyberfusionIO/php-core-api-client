<?php

namespace Cyberfusion\CoreApi\Requests\TaskCollections;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\TaskCollectionResource;
use JsonException;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

/**
 * Task collections can be retried for 45 days after the last retry.
 */
class RetryTaskCollection extends Request implements CoreApiRequestContract
{
    protected Method $method = Method::POST;

    public function __construct(
        private readonly string $uuid,
        private readonly ?string $callbackUrl = null,
        private readonly array $includes = [],
    ) {
    }

    public function resolveEndpoint(): string
    {
        return sprintf('/api/v1/task-collections/%s/retry', $this->uuid);
    }

    protected function defaultQuery(): array
    {
        $parameters = [];
        $parameters['callback_url'] = $this->callbackUrl;
        $parameters['includes'] = implode(',', $this->includes);

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
