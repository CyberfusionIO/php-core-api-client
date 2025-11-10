<?php

namespace Cyberfusion\CoreApi\Requests\UrlRedirects;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\DetailMessage;
use JsonException;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class DeleteUrlRedirect extends Request implements CoreApiRequestContract
{
    protected Method $method = Method::DELETE;

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
     * @returns DetailMessage
     */
    public function createDtoFromResponse(Response $response): DetailMessage
    {
        return DetailMessage::fromArray($response->json());
    }
}
