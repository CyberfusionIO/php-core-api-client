<?php

namespace Cyberfusion\CoreApi\Requests\HtpasswdFiles;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\DetailMessage;
use Cyberfusion\CoreApi\Models\HtpasswdFileCreateRequest;
use Cyberfusion\CoreApi\Models\HtpasswdFileResource;
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
 * Compatible cluster groups: * Web
 */
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
     * @returns HtpasswdFileResource|DetailMessage|Collection<ValidationError>
     */
    public function createDtoFromResponse(Response $response): HtpasswdFileResource|DetailMessage|Collection
    {
        return DtoBuilder::for($response, HtpasswdFileResource::class)->build();
    }
}
