<?php

namespace Cyberfusion\CoreApi\Requests\HtpasswdUsers;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\HtpasswdUserResource;
use Cyberfusion\CoreApi\Support\Filter;
use Cyberfusion\CoreApi\Support\Sorter;
use Cyberfusion\CoreApi\Support\UrlBuilder;
use Illuminate\Support\Collection;
use JsonException;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class ListHtpasswdUsers extends Request implements CoreApiRequestContract
{
    protected Method $method = Method::GET;

    public function __construct(
        private readonly ?int $skip = null,
        private readonly ?int $limit = null,
        private readonly ?Filter $filter = null,
        private readonly ?Sorter $sort = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return UrlBuilder::for('/api/v1/htpasswd-users')
            ->addQueryParameter('skip', $this->skip)
            ->addQueryParameter('limit', $this->limit)
            ->filter($this->filter)
            ->sorter($this->sort)
            ->getEndpoint();
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
