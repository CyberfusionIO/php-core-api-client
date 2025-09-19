<?php

namespace Cyberfusion\CoreApi\Requests\Logs;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\WebServerLogErrorResource;
use Cyberfusion\CoreApi\Support\Sorter;
use Cyberfusion\CoreApi\Support\UrlBuilder;
use Illuminate\Support\Collection;
use JsonException;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

/**
 * Every object is a logged error.
 */
class ListErrorLogs extends Request implements CoreApiRequestContract
{
    protected Method $method = Method::GET;

    public function __construct(
        private readonly int $virtualHostId,
        private readonly ?string $timestamp = null,
        private readonly ?Sorter $sort = null,
        private readonly ?int $limit = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return UrlBuilder::for('/api/v1/logs/error/%d')
            ->addPathParameter($this->virtualHostId)
            ->addQueryParameter('timestamp', $this->timestamp)
            ->sorter($this->sort)
            ->addQueryParameter('limit', $this->limit)
            ->getEndpoint();
    }

    /**
     * @throws JsonException
     * @returns Collection<WebServerLogErrorResource>
     */
    public function createDtoFromResponse(Response $response): Collection
    {
        return $response->collect()->map(fn (array $item) => WebServerLogErrorResource::fromArray($item));
    }
}
