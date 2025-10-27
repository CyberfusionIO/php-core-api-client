<?php

namespace Cyberfusion\CoreApi\Resources;

use Cyberfusion\CoreApi\CoreApiResource;
use Cyberfusion\CoreApi\Models\BodyLoginAccessToken;
use Cyberfusion\CoreApi\Requests\Login\RequestAccessToken;
use Cyberfusion\CoreApi\Requests\Login\TestAccessToken;
use Saloon\Http\Response;

class Login extends CoreApiResource
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
