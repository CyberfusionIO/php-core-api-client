<?php

namespace Cyberfusion\CoreApi\Requests\UrlRedirects;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\UrlRedirectCreateRequest;
use Cyberfusion\CoreApi\Models\UrlRedirectResource;
use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class CreateUrlRedirect extends Request implements CoreApiRequestContract, HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        private readonly UrlRedirectCreateRequest $urlRedirectCreateRequest,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/v1/url-redirects';
    }

    public function defaultBody(): array
    {
        return $this->urlRedirectCreateRequest->toArray();
    }

    /**
     * @throws JsonException
     * @returns UrlRedirectResource
     */
    public function createDtoFromResponse(Response $response): UrlRedirectResource
    {
        return UrlRedirectResource::fromArray($response->json());
    }
}
