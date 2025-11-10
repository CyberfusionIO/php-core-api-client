<?php

namespace Cyberfusion\CoreApi\Requests\Cmses;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\CmsOption;
use Cyberfusion\CoreApi\Models\CmsOptionUpdateRequest;
use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

/**
 * This endpoint supports only WordPress CMSes. Refer to the following documentation: https://codex.wordpress.org/Option_Reference
 */
class UpdateCmsOption extends Request implements CoreApiRequestContract, HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PATCH;

    public function __construct(
        private readonly int $id,
        private readonly string $name,
        private readonly CmsOptionUpdateRequest $cmsOptionUpdateRequest,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return sprintf('/api/v1/cmses/%d/options/%s', $this->id, $this->name);
    }

    public function defaultBody(): array
    {
        return $this->cmsOptionUpdateRequest->toArray();
    }

    /**
     * @throws JsonException
     * @returns CmsOption
     */
    public function createDtoFromResponse(Response $response): CmsOption
    {
        return CmsOption::fromArray($response->json());
    }
}
