<?php

namespace Cyberfusion\CoreApi\Requests\Logs;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\RequestLogResource;
use Cyberfusion\CoreApi\Models\RequestLogsSearchRequest;
use Illuminate\Support\Collection;
use JsonException;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\Contracts\Paginatable;

class ListRequestLogs extends Request implements CoreApiRequestContract, Paginatable
{
    protected Method $method = Method::GET;

    public function __construct(
        private readonly ?RequestLogsSearchRequest $includeFilters = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/v1/request-logs';
    }

    protected function defaultQuery(): array
    {
        $parameters = $this->includeFilters?->toArray() ?? [];

        return array_filter($parameters);
    }

    /**
     * @throws JsonException
     * @returns Collection<RequestLogResource>
     */
    public function createDtoFromResponse(Response $response): Collection
    {
        return $response->collect()->map(fn (array $item) => RequestLogResource::fromArray($item));
    }
}
