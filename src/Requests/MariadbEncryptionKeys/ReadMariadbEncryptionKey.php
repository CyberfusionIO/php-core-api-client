<?php

namespace Cyberfusion\CoreApi\Requests\MariadbEncryptionKeys;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\MariadbEncryptionKeyResource;
use JsonException;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class ReadMariadbEncryptionKey extends Request implements CoreApiRequestContract
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
     * @returns MariadbEncryptionKeyResource
     */
    public function createDtoFromResponse(Response $response): MariadbEncryptionKeyResource
    {
        return MariadbEncryptionKeyResource::fromArray($response->json());
    }
}
