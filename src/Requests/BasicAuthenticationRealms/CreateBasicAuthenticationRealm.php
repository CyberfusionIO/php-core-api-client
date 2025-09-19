<?php

namespace Cyberfusion\CoreApi\Requests\BasicAuthenticationRealms;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\BasicAuthenticationRealmCreateRequest;
use Cyberfusion\CoreApi\Models\BasicAuthenticationRealmResource;
use Cyberfusion\CoreApi\Support\UrlBuilder;
use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

/**
 * The following combinations of attributes are unique: - `directory_path` + `virtual_host_id` For Apache, basic authentication does not apply when the virtual host custom config contains a `Require` directive.
 */
class CreateBasicAuthenticationRealm extends Request implements CoreApiRequestContract, HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        private readonly BasicAuthenticationRealmCreateRequest $basicAuthenticationRealmCreateRequest,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return UrlBuilder::for('/api/v1/basic-authentication-realms')->getEndpoint();
    }

    public function defaultBody(): array
    {
        return $this->basicAuthenticationRealmCreateRequest->toArray();
    }

    /**
     * @throws JsonException
     * @returns BasicAuthenticationRealmResource
     */
    public function createDtoFromResponse(Response $response): BasicAuthenticationRealmResource
    {
        return BasicAuthenticationRealmResource::fromArray($response->json());
    }
}
