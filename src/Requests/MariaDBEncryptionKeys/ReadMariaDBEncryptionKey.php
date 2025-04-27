<?php

namespace Cyberfusion\CoreApi\Requests\MariaDBEncryptionKeys;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\MariaDBEncryptionKeyResource;
use Cyberfusion\CoreApi\Support\UrlBuilder;
use JsonException;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class ReadMariaDBEncryptionKey extends Request implements CoreApiRequestContract
{
    protected Method $method = Method::GET;

    public function __construct(
        private readonly int $id,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return UrlBuilder::for('/api/v1/mariadb-encryption-keys/%d')
            ->addPathParameter($this->id)
            ->getEndpoint();
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
