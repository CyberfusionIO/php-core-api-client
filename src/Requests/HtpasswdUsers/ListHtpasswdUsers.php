<?php

namespace Cyberfusion\CoreApi\Requests\HtpasswdUsers;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\HtpasswdUserResource;
use Cyberfusion\CoreApi\Models\HtpasswdUsersSearchRequest;
use Illuminate\Support\Collection;
use JsonException;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\Contracts\Paginatable;

class ListHtpasswdUsers extends Request implements CoreApiRequestContract, Paginatable
{
    protected Method $method = Method::GET;

    public function __construct(
        private readonly ?HtpasswdUsersSearchRequest $includeFilters = null,
        private readonly array $includes = [],
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/v1/htpasswd-users';
    }

    protected function defaultQuery(): array
    {
        $parameters = $this->includeFilters?->toArray() ?? [];
        $parameters['includes'] = implode(',', $this->includes);

        return array_filter($parameters);
    }

    /**
     * @throws JsonException
     * @returns Collection<HtpasswdUserResource>
     */
    public function createDtoFromResponse(Response $response): Collection
    {
        return $response->collect()->map(fn (array $item) => HtpasswdUserResource::fromArray($item));
    }
}
