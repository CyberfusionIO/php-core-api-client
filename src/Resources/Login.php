<?php

namespace Cyberfusion\CoreApi\Resources;

use Cyberfusion\CoreApi\Models\BodyLoginAccessToken;
use Cyberfusion\CoreApi\Requests\Login\RequestAccessToken;
use Cyberfusion\CoreApi\Requests\Login\TestAccessToken;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;

class Login extends BaseResource
{
    public function requestAccessToken(BodyLoginAccessToken $bodyLoginAccessToken, string $baseUrl): Response
    {
        return $this->connector->send(new RequestAccessToken($bodyLoginAccessToken, $baseUrl));
    }

    public function testAccessToken(): Response
    {
        return $this->connector->send(new TestAccessToken());
    }
}
