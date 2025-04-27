<?php

namespace Cyberfusion\CoreApi\Requests\BasicAuthenticationRealms;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\BasicAuthenticationRealmResource;
use Cyberfusion\CoreApi\Models\BasicAuthenticationRealmUpdateDeprecatedRequest;
use Cyberfusion\CoreApi\Support\UrlBuilder;
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
     * @returns BasicAuthenticationRealmResource
     */
    public function createDtoFromResponse(Response $response): BasicAuthenticationRealmResource
    {
        return BasicAuthenticationRealmResource::fromArray($response->json());
    }
}
