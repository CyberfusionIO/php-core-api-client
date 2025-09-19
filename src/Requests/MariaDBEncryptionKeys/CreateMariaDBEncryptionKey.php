<?php

namespace Cyberfusion\CoreApi\Requests\MariaDBEncryptionKeys;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\MariaDBEncryptionKeyCreateRequest;
use Cyberfusion\CoreApi\Models\MariaDBEncryptionKeyResource;
use Cyberfusion\CoreApi\Support\UrlBuilder;
use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class CreateMariaDBEncryptionKey extends Request implements CoreApiRequestContract, HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        private readonly MariaDBEncryptionKeyCreateRequest $mariaDBEncryptionKeyCreateRequest,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return UrlBuilder::for('/api/v1/mariadb-encryption-keys')->getEndpoint();
    }

    public function defaultBody(): array
    {
        return $this->mariaDBEncryptionKeyCreateRequest->toArray();
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
