<?php

namespace Cyberfusion\CoreApi\Requests\BasicAuthenticationRealms;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\BasicAuthenticationRealmResource;
use Cyberfusion\CoreApi\Models\BasicAuthenticationRealmUpdateDeprecatedRequest;
use Cyberfusion\CoreApi\Models\DetailMessage;
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
 * The following properties can never be updated to a different value: * `directory_path` * `virtual_host_id`
 */
class DeprecatedUpdateBasicAuthenticationRealm extends Request implements CoreApiRequestContract, HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;

    public function __construct(
        private readonly int $id,
        private readonly BasicAuthenticationRealmUpdateDeprecatedRequest $basicAuthenticationRealmUpdateDeprecatedRequest,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return UrlBuilder::for('/api/v1/basic-authentication-realms/%d')
            ->addPathParameter($this->id)
            ->getEndpoint();
    }

    public function defaultBody(): array
    {
        return $this->basicAuthenticationRealmUpdateDeprecatedRequest->toArray();
    }

    /**
     * @throws JsonException
     * @returns BasicAuthenticationRealmResource|DetailMessage|Collection<ValidationError>
     */
    public function createDtoFromResponse(
        Response $response,
    ): BasicAuthenticationRealmResource|DetailMessage|Collection {
        return DtoBuilder::for($response, BasicAuthenticationRealmResource::class)->build();
    }
}
