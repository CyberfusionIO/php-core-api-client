<?php

namespace Cyberfusion\CoreApi\Requests\URLRedirects;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\URLRedirectResource;
use Cyberfusion\CoreApi\Models\URLRedirectUpdateRequest;
use Cyberfusion\CoreApi\Support\UrlBuilder;
use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class UpdateURLRedirect extends Request implements CoreApiRequestContract, HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PATCH;

    public function __construct(
        private readonly int $id,
        private readonly URLRedirectUpdateRequest $uRLRedirectUpdateRequest,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return UrlBuilder::for('/api/v1/url-redirects/%d')
            ->addPathParameter($this->id)
            ->getEndpoint();
    }

    public function defaultBody(): array
    {
        return $this->uRLRedirectUpdateRequest->toArray();
    }

    /**
     * @throws JsonException
     * @returns URLRedirectResource
     */
    public function createDtoFromResponse(Response $response): URLRedirectResource
    {
        return URLRedirectResource::fromArray($response->json());
    }
}
