<?php

namespace Cyberfusion\CoreApi\Requests\Login;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\CoreApiUnauthenticated;
use Cyberfusion\CoreApi\Models\BodyLoginAccessToken;
use Cyberfusion\CoreApi\Models\TokenResource;
use JsonException;
use Saloon\Contracts\Authenticator;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasFormBody;

/**
 * Access tokens are valid for 30 minutes.
 */
class RequestAccessToken extends Request implements CoreApiRequestContract, HasBody
{
    use HasFormBody;

    protected Method $method = Method::POST;

    public function __construct(
        private readonly BodyLoginAccessToken $bodyLoginAccessToken,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/v1/login/access-token';
    }

    public function defaultBody(): array
    {
        return $this->bodyLoginAccessToken->toArray();
    }

    public function defaultAuth(): ?Authenticator
    {
        return new CoreApiUnauthenticated();
    }

    /**
     * @throws JsonException
     * @returns TokenResource
     */
    public function createDtoFromResponse(Response $response): TokenResource
    {
        return TokenResource::fromArray($response->json());
    }
}
