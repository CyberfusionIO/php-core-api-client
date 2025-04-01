<?php

namespace Cyberfusion\CoreApi\Requests\BasicAuthenticationRealms;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\BasicAuthenticationRealmResource;
use Cyberfusion\CoreApi\Models\BasicAuthenticationRealmUpdateRequest;
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

class UpdateBasicAuthenticationRealm extends Request implements CoreApiRequestContract, HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PATCH;

    public function __construct(
        private readonly int $id,
        private readonly BasicAuthenticationRealmUpdateRequest $basicAuthenticationRealmUpdateRequest,
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
        return $this->basicAuthenticationRealmUpdateRequest->toArray();
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
