<?php

namespace Cyberfusion\CoreApi\Requests\MariaDBEncryptionKeys;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\DetailMessage;
use Cyberfusion\CoreApi\Models\MariaDBEncryptionKeyCreateRequest;
use Cyberfusion\CoreApi\Models\MariaDBEncryptionKeyResource;
use Cyberfusion\CoreApi\Models\ValidationError;
use Cyberfusion\CoreApi\Support\DtoBuilder;
use Cyberfusion\CoreApi\Support\UrlBuilder;
use Illuminate\Support\Collection;
use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Compatible cluster groups: * Database
 */
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
     * @returns MariaDBEncryptionKeyResource|DetailMessage|Collection<ValidationError>
     */
    public function createDtoFromResponse(Response $response): MariaDBEncryptionKeyResource|DetailMessage|Collection
    {
        return DtoBuilder::for($response, MariaDBEncryptionKeyResource::class)->build();
    }
}
