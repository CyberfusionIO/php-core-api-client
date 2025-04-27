<?php

namespace Cyberfusion\CoreApi\Requests\TaskCollections;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\TaskResult;
use Cyberfusion\CoreApi\Support\UrlBuilder;
use Illuminate\Support\Collection;
use JsonException;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

/**
 * Task collection results are available for 21 days.
 */
class ListTaskCollectionResults extends Request implements CoreApiRequestContract
{
    protected Method $method = Method::GET;

    public function __construct(
        private readonly string $uuid,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return UrlBuilder::for('/api/v1/task-collections/%s/results')
            ->addPathParameter($this->uuid)
            ->getEndpoint();
    }

    /**
     * @throws JsonException
     * @returns Collection<TaskResult>
     */
    public function createDtoFromResponse(Response $response): Collection
    {
        return $response->collect()->map(fn (array $item) => TaskResult::fromArray($item));
    }
}
