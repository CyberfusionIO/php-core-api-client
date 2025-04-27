<?php

namespace Cyberfusion\CoreApi\Requests\TaskCollections;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\TaskCollectionResource;
use Cyberfusion\CoreApi\Support\UrlBuilder;
use JsonException;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

/**
 * Task collections can be retried for 21 days after the last retry.
 */
class RetryTaskCollection extends Request implements CoreApiRequestContract
{
    protected Method $method = Method::POST;

    public function __construct(
        private readonly string $uuid,
        private readonly ?string $callbackUrl = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return UrlBuilder::for('/api/v1/task-collections/%s/retry')
            ->addPathParameter($this->uuid)
            ->addQueryParameter('callback_url', $this->callbackUrl)
            ->getEndpoint();
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
