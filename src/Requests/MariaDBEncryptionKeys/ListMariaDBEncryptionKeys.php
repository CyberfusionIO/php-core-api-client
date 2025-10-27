<?php

namespace Cyberfusion\CoreApi\Requests\MariaDBEncryptionKeys;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\MariaDBEncryptionKeyResource;
use Cyberfusion\CoreApi\Models\MariadbEncryptionKeysSearchRequest;
use Illuminate\Support\Collection;
use JsonException;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\Contracts\Paginatable;

class ListMariaDBEncryptionKeys extends Request implements CoreApiRequestContract, Paginatable
{
    protected Method $method = Method::GET;

    public function __construct(
        private readonly ?MariadbEncryptionKeysSearchRequest $includeFilters = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/v1/mariadb-encryption-keys';
    }

    protected function defaultQuery(): array
    {
        $parameters = $this->includeFilters?->toArray() ?? [];

        return array_filter($parameters);
    }

    /**
     * @throws JsonException
     * @returns Collection<MariaDBEncryptionKeyResource>
     */
    public function createDtoFromResponse(Response $response): Collection
    {
        return $response->collect()->map(fn (array $item) => MariaDBEncryptionKeyResource::fromArray($item));
    }
}
