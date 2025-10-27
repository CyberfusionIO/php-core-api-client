<?php

namespace Cyberfusion\CoreApi\Requests\BorgArchives;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\BorgArchiveResource;
use Cyberfusion\CoreApi\Models\BorgArchivesSearchRequest;
use Illuminate\Support\Collection;
use JsonException;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\Contracts\Paginatable;

class ListBorgArchives extends Request implements CoreApiRequestContract, Paginatable
{
    protected Method $method = Method::GET;

    public function __construct(
        private readonly ?BorgArchivesSearchRequest $includeFilters = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/v1/borg-archives';
    }

    protected function defaultQuery(): array
    {
        $parameters = $this->includeFilters?->toArray() ?? [];

        return array_filter($parameters);
    }

    /**
     * @throws JsonException
     * @returns Collection<BorgArchiveResource>
     */
    public function createDtoFromResponse(Response $response): Collection
    {
        return $response->collect()->map(fn (array $item) => BorgArchiveResource::fromArray($item));
    }
}
