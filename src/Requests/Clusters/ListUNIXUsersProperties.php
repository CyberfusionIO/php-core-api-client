<?php

namespace Cyberfusion\CoreApi\Requests\Clusters;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\ClusterUnixUsersPropertiesResource;
use Cyberfusion\CoreApi\Models\ClustersUnixUsersPropertiesSearchRequest;
use Illuminate\Support\Collection;
use JsonException;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\Contracts\Paginatable;

class ListUNIXUsersProperties extends Request implements CoreApiRequestContract, Paginatable
{
    protected Method $method = Method::GET;

    public function __construct(
        private readonly ?ClustersUnixUsersPropertiesSearchRequest $includeFilters = null,
        private readonly array $includes = [],
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/v1/clusters/properties/unix-users';
    }

    protected function defaultQuery(): array
    {
        $parameters = $this->includeFilters?->toArray() ?? [];
        $parameters['includes'] = implode(',', $this->includes);

        return array_filter($parameters);
    }

    /**
     * @throws JsonException
     * @returns Collection<ClusterUnixUsersPropertiesResource>
     */
    public function createDtoFromResponse(Response $response): Collection
    {
        return $response->collect()->map(fn (array $item) => ClusterUnixUsersPropertiesResource::fromArray($item));
    }
}
