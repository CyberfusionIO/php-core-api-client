<?php

namespace Cyberfusion\CoreApi\Requests\Cmses;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\CmsCreateRequest;
use Cyberfusion\CoreApi\Models\CmsResource;
use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class CreateCms extends Request implements CoreApiRequestContract, HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        private readonly CmsCreateRequest $cmsCreateRequest,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/v1/cmses';
    }

    public function defaultBody(): array
    {
        return $this->cmsCreateRequest->toArray();
    }

    /**
     * @throws JsonException
     * @returns CmsResource
     */
    public function createDtoFromResponse(Response $response): CmsResource
    {
        return CmsResource::fromArray($response->json());
    }
}
