<?php

namespace Cyberfusion\CoreApi\Requests\Crons;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\CronResource;
use Cyberfusion\CoreApi\Models\CronsSearchRequest;
use Illuminate\Support\Collection;
use JsonException;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\Contracts\Paginatable;

class ListCrons extends Request implements CoreApiRequestContract, Paginatable
{
    protected Method $method = Method::GET;

    public function __construct(
        private readonly ?CronsSearchRequest $includeFilters = null,
        private readonly array $includes = [],
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/v1/crons';
    }

    protected function defaultQuery(): array
    {
        $parameters = $this->includeFilters?->toArray() ?? [];
        $parameters['includes'] = implode(',', $this->includes);

        return array_filter($parameters);
    }

    /**
     * @throws JsonException
     * @returns Collection<CronResource>
     */
    public function createDtoFromResponse(Response $response): Collection
    {
        return $response->collect()->map(fn (array $item) => CronResource::fromArray($item));
    }
}
