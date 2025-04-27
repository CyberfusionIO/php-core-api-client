<?php

namespace Cyberfusion\CoreApi\Requests\BasicAuthenticationRealms;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\BasicAuthenticationRealmResource;
use Cyberfusion\CoreApi\Support\UrlBuilder;
use JsonException;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class ReadBasicAuthenticationRealm extends Request implements CoreApiRequestContract
{
    protected Method $method = Method::GET;

    public function __construct(
        private readonly int $id,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return UrlBuilder::for('/api/v1/basic-authentication-realms/%d')
            ->addPathParameter($this->id)
            ->getEndpoint();
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
