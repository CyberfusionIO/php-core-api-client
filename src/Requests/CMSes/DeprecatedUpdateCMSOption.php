<?php

namespace Cyberfusion\CoreApi\Requests\CMSes;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\CMSOption;
use Cyberfusion\CoreApi\Models\CMSOptionUpdateDeprecatedRequest;
use Cyberfusion\CoreApi\Models\DetailMessage;
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
 * This endpoint supports only WordPress CMSes. WordPress Toolkit must be enabled on cluster (`wordpress_toolkit_enabled`). Refer to the following documentation: https://codex.wordpress.org/Option_Reference
 */
class DeprecatedUpdateCMSOption extends Request implements CoreApiRequestContract, HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;

    public function __construct(
        private readonly int $id,
        private readonly string $name,
        private readonly CMSOptionUpdateDeprecatedRequest $cMSOptionUpdateDeprecatedRequest,
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
        return $this->cMSOptionUpdateDeprecatedRequest->toArray();
    }

    /**
     * @throws JsonException
     * @returns CMSOption|DetailMessage|Collection<ValidationError>
     */
    public function createDtoFromResponse(Response $response): CMSOption|DetailMessage|Collection
    {
        return DtoBuilder::for($response, CMSOption::class)->build();
    }
}
