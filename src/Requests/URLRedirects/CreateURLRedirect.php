<?php

namespace Cyberfusion\CoreApi\Requests\URLRedirects;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\DetailMessage;
use Cyberfusion\CoreApi\Models\URLRedirectCreateRequest;
use Cyberfusion\CoreApi\Models\URLRedirectResource;
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

/**
 * Compatible cluster groups: * Redirect The following combinations of attributes are unique: - `domain`
 */
class CreateURLRedirect extends Request implements CoreApiRequestContract, HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        private readonly URLRedirectCreateRequest $uRLRedirectCreateRequest,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return UrlBuilder::for('/api/v1/url-redirects')->getEndpoint();
    }

    public function defaultBody(): array
    {
        return $this->uRLRedirectCreateRequest->toArray();
    }

    /**
     * @throws JsonException
     * @returns URLRedirectResource|DetailMessage|Collection<ValidationError>
     */
    public function createDtoFromResponse(Response $response): URLRedirectResource|DetailMessage|Collection
    {
        return DtoBuilder::for($response, URLRedirectResource::class)->build();
    }
}
