<?php

namespace Cyberfusion\CoreApi\Requests\HtpasswdFiles;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\HtpasswdFileResource;
use Cyberfusion\CoreApi\Support\UrlBuilder;
use JsonException;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class ReadHtpasswdFile extends Request implements CoreApiRequestContract
{
    protected Method $method = Method::GET;

    public function __construct(
        private readonly int $id,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return UrlBuilder::for('/api/v1/htpasswd-files/%d')
            ->addPathParameter($this->id)
            ->getEndpoint();
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
