<?php

namespace Cyberfusion\CoreApi\Requests\Login;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\BodyLoginAccessToken;
use Cyberfusion\CoreApi\Models\DetailMessage;
use Cyberfusion\CoreApi\Models\TokenResource;
use Cyberfusion\CoreApi\Models\ValidationError;
use Cyberfusion\CoreApi\Support\DtoBuilder;
use Cyberfusion\CoreApi\Support\UrlBuilder;
use Illuminate\Support\Collection;
use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Response;
use Saloon\Http\SoloRequest;
use Saloon\Traits\Body\HasFormBody;

/**
 * Access tokens are valid for 30 minutes.
 */
class RequestAccessToken extends SoloRequest implements CoreApiRequestContract, HasBody
{
    use HasFormBody;

    protected Method $method = Method::POST;

    public function __construct(
        private readonly BodyLoginAccessToken $bodyLoginAccessToken,
        private readonly string $baseUrl,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return UrlBuilder::for($this->baseUrl . '/api/v1/login/access-token')->getEndpoint();
    }

    public function defaultBody(): array
    {
        return $this->bodyLoginAccessToken->toArray();
    }

    /**
     * @throws JsonException
     * @returns TokenResource|DetailMessage|Collection<ValidationError>
     */
    public function createDtoFromResponse(Response $response): TokenResource|DetailMessage|Collection
    {
        return DtoBuilder::for($response, TokenResource::class)->build();
    }
}
