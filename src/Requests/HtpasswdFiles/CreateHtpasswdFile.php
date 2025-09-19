<?php

namespace Cyberfusion\CoreApi\Requests\HtpasswdFiles;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\HtpasswdFileCreateRequest;
use Cyberfusion\CoreApi\Models\HtpasswdFileResource;
use Cyberfusion\CoreApi\Support\UrlBuilder;
use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class CreateHtpasswdFile extends Request implements CoreApiRequestContract, HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        private readonly HtpasswdFileCreateRequest $htpasswdFileCreateRequest,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return UrlBuilder::for('/api/v1/htpasswd-files')->getEndpoint();
    }

    public function defaultBody(): array
    {
        return $this->htpasswdFileCreateRequest->toArray();
    }

    /**
     * @throws JsonException
     * @returns HtpasswdFileResource
     */
    public function createDtoFromResponse(Response $response): HtpasswdFileResource
    {
        return HtpasswdFileResource::fromArray($response->json());
    }
}
