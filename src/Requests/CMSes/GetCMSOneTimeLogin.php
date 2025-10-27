<?php

namespace Cyberfusion\CoreApi\Requests\CMSes;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\CMSOneTimeLogin;
use JsonException;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

/**
 * This endpoint supports only WordPress CMSes.
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
        return sprintf('/api/v1/cmses/%d/one-time-login', $this->id);
    }

    /**
     * @throws JsonException
     * @returns CMSOneTimeLogin
     */
    public function createDtoFromResponse(Response $response): CMSOneTimeLogin
    {
        return CMSOneTimeLogin::fromArray($response->json());
    }
}
