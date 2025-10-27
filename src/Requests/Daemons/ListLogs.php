<?php

namespace Cyberfusion\CoreApi\Requests\Daemons;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Enums\LogSortOrderEnum;
use Cyberfusion\CoreApi\Models\DaemonLogResource;
use Illuminate\Support\Collection;
use JsonException;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class ListLogs extends Request implements CoreApiRequestContract
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
        return sprintf('/api/v1/daemons/%d/logs', $this->id);
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
     * @returns Collection<DaemonLogResource>
     */
    public function createDtoFromResponse(Response $response): Collection
    {
        return $response->collect()->map(fn (array $item) => DaemonLogResource::fromArray($item));
    }
}
