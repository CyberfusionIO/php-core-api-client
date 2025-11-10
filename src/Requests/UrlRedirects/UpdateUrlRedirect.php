<?php

namespace Cyberfusion\CoreApi\Requests\UrlRedirects;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\UrlRedirectResource;
use Cyberfusion\CoreApi\Models\UrlRedirectUpdateRequest;
use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class UpdateUrlRedirect extends Request implements CoreApiRequestContract, HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PATCH;

    public function __construct(
        private readonly int $id,
        private readonly UrlRedirectUpdateRequest $urlRedirectUpdateRequest,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return sprintf('/api/v1/url-redirects/%d', $this->id);
    }

    public function defaultBody(): array
    {
        return $this->urlRedirectUpdateRequest->toArray();
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
