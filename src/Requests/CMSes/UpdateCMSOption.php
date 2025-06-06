<?php

namespace Cyberfusion\CoreApi\Requests\CMSes;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\CMSOption;
use Cyberfusion\CoreApi\Models\CMSOptionUpdateRequest;
use Cyberfusion\CoreApi\Support\UrlBuilder;
use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

/**
 * This endpoint supports only WordPress CMSes. WordPress Toolkit must be enabled on cluster (`wordpress_toolkit_enabled`). Refer to the following documentation: https://codex.wordpress.org/Option_Reference
 */
class UpdateCMSOption extends Request implements CoreApiRequestContract, HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PATCH;

    public function __construct(
        private readonly int $id,
        private readonly string $name,
        private readonly CMSOptionUpdateRequest $cMSOptionUpdateRequest,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return UrlBuilder::for('/api/v1/cmses/%d/options/%s')
            ->addPathParameter($this->id)
            ->addPathParameter($this->name)
            ->getEndpoint();
    }

    public function defaultBody(): array
    {
        return $this->cMSOptionUpdateRequest->toArray();
    }

    /**
     * @throws JsonException
     * @returns CMSOption
     */
    public function createDtoFromResponse(Response $response): CMSOption
    {
        return CMSOption::fromArray($response->json());
    }
}
