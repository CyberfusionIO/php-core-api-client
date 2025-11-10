<?php

namespace Cyberfusion\CoreApi\Requests\MariadbEncryptionKeys;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\MariadbEncryptionKeyCreateRequest;
use Cyberfusion\CoreApi\Models\MariadbEncryptionKeyResource;
use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class CreateMariadbEncryptionKey extends Request implements CoreApiRequestContract, HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        private readonly MariadbEncryptionKeyCreateRequest $mariadbEncryptionKeyCreateRequest,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/v1/mariadb-encryption-keys';
    }

    public function defaultBody(): array
    {
        return $this->mariadbEncryptionKeyCreateRequest->toArray();
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
