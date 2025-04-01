<?php

namespace Cyberfusion\CoreApi\Requests\CMSes;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\CMSOneTimeLogin;
use Cyberfusion\CoreApi\Models\DetailMessage;
use Cyberfusion\CoreApi\Models\ValidationError;
use Cyberfusion\CoreApi\Support\DtoBuilder;
use Cyberfusion\CoreApi\Support\UrlBuilder;
use Illuminate\Support\Collection;
use JsonException;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

/**
 * This endpoint supports only WordPress CMSes. WordPress Toolkit must be enabled on cluster (`wordpress_toolkit_enabled`).
 */
class GetCMSOneTimeLogin extends Request implements CoreApiRequestContract
{
    protected Method $method = Method::GET;

    public function __construct(
        private readonly int $id,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return UrlBuilder::for('/api/v1/cmses/%d/one-time-login')
            ->addPathParameter($this->id)
            ->getEndpoint();
    }

    /**
     * @throws JsonException
     * @returns CMSOneTimeLogin|DetailMessage|Collection<ValidationError>
     */
    public function createDtoFromResponse(Response $response): CMSOneTimeLogin|DetailMessage|Collection
    {
        return DtoBuilder::for($response, CMSOneTimeLogin::class)->build();
    }
}
