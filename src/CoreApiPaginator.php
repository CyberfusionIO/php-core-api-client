<?php

namespace Cyberfusion\CoreApi;

use Graviton\LinkHeaderParser\LinkHeader;
use Illuminate\Support\Collection;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\PagedPaginator;

class CoreApiPaginator extends PagedPaginator
{
    protected ?int $perPageLimit = 50;

    protected int $currentPage = 1;

    protected function isLastPage(Response $response): bool
    {
        return LinkHeader::fromString($response->header('link'))->getRel('next') === null;
    }

    protected function getPageItems(Response $response, Request $request): array
    {
        if (method_exists($request, 'createDtoFromResponse')) {
            $dto = $response->dto();

            return $dto instanceof Collection
                ? $dto->all()
                : $dto;
        }

        return $response->json();
    }

    protected function getTotalPages(Response $response): int
    {
        $total = $response->header('x-total-count');
        if ($total === null) {
            return 0;
        }

        return (int) ceil((int) $total / $this->perPageLimit);
    }
}
