<?php

namespace Cyberfusion\CoreApi\Requests\MariaDBEncryptionKeys;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\MariaDBEncryptionKeyResource;
use JsonException;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class ReadMariaDBEncryptionKey extends Request implements CoreApiRequestContract
{
    protected Method $method = Method::GET;

    public function __construct(
        private readonly int $id,
        private readonly array $includes = [],
    ) {
    }

    public function resolveEndpoint(): string
    {
        return sprintf('/api/v1/mariadb-encryption-keys/%d', $this->id);
    }

    protected function defaultQuery(): array
    {
        $parameters = [];
        $parameters['includes'] = implode(',', $this->includes);

        return array_filter($parameters);
    }

    /**
     * @throws JsonException
     * @returns MariaDBEncryptionKeyResource
     */
    public function createDtoFromResponse(Response $response): MariaDBEncryptionKeyResource
    {
        return MariaDBEncryptionKeyResource::fromArray($response->json());
    }
}
