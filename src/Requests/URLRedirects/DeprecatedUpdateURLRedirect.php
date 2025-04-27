<?php

namespace Cyberfusion\CoreApi\Requests\URLRedirects;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\URLRedirectResource;
use Cyberfusion\CoreApi\Models\URLRedirectUpdateDeprecatedRequest;
use Cyberfusion\CoreApi\Support\UrlBuilder;
use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

/**
 * The following properties can never be updated to a different value: * `domain`
 */
class DeprecatedUpdateURLRedirect extends Request implements CoreApiRequestContract, HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;

    public function __construct(
        private readonly int $id,
        private readonly URLRedirectUpdateDeprecatedRequest $uRLRedirectUpdateDeprecatedRequest,
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
        return $this->uRLRedirectUpdateDeprecatedRequest->toArray();
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
