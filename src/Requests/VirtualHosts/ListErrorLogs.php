<?php

namespace Cyberfusion\CoreApi\Requests\VirtualHosts;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Enums\LogSortOrderEnum;
use Cyberfusion\CoreApi\Models\WebServerLogErrorResource;
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
        private readonly int $id,
        private readonly ?string $timestamp = null,
        private readonly ?LogSortOrderEnum $sort = null,
        private readonly ?int $limit = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return sprintf('/api/v1/virtual-hosts/%d/logs/error', $this->id);
    }

    protected function defaultQuery(): array
    {
        $parameters = [];
        $parameters['timestamp'] = $this->timestamp;
        $parameters['sort'] = $this->sort;
        $parameters['limit'] = $this->limit;

        return array_filter($parameters);
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
