<?php

namespace Cyberfusion\CoreApi\Requests\URLRedirects;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\URLRedirectResource;
use JsonException;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class ReadURLRedirect extends Request implements CoreApiRequestContract
{
    protected Method $method = Method::GET;

    public function __construct(
        private readonly int $id,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return sprintf('/api/v1/url-redirects/%d', $this->id);
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
