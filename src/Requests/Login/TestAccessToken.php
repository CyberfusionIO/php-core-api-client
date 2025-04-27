<?php

namespace Cyberfusion\CoreApi\Requests\Login;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\APIUserInfo;
use Cyberfusion\CoreApi\Support\UrlBuilder;
use JsonException;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

/**
 * If the access token is not valid, a new access token should be requested.
 */
class TestAccessToken extends Request implements CoreApiRequestContract
{
    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return UrlBuilder::for('/api/v1/login/test-token')->getEndpoint();
    }

    /**
     * @throws JsonException
     * @returns APIUserInfo
     */
    public function createDtoFromResponse(Response $response): APIUserInfo
    {
        return APIUserInfo::fromArray($response->json());
    }
}
