<?php

namespace Cyberfusion\CoreApi\Tests\Unit\Support;

use Cyberfusion\CoreApi\CoreApiConnector;
use Cyberfusion\CoreApi\Models\MailDomainCreateRequest;
use Cyberfusion\CoreApi\Models\MailDomainResource;
use Cyberfusion\CoreApi\Models\ValidationError;
use Cyberfusion\CoreApi\Requests\Login\RequestAccessToken;
use Cyberfusion\CoreApi\Requests\MailDomains\CreateMailDomain;
use Cyberfusion\CoreApi\Requests\MailDomains\ListMailDomains;
use Cyberfusion\CoreApi\Support\ManualRequest;
use Cyberfusion\CoreApi\Tests\Unit\RequestTestCase;
use Illuminate\Support\Collection;
use Saloon\Enums\Method;
use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;

class ManualRequestTestCase extends RequestTestCase
{
    public function test_it_perfoms_a_manual_request(): void
    {
        $mockClient = MockClient::global([
            RequestAccessToken::class => MockResponse::make([
                'access_token' => 'access_allowed',
                'token_type' => 'bearer',
                'expires_in' => 3600,
            ]),
            'https://core-api.cyberfusion.nl/v1/manual-request' => MockResponse::make([
                'success' => true,
            ]),
        ]);

        $connector = new CoreApiConnector(
            username: 'username',
            password: 'password'
        );
        $connector->withMockClient($mockClient);

        $response = $connector->send(new ManualRequest(
            url: 'https://core-api.cyberfusion.nl/v1/manual-request',
            method: Method::POST,
            data: [
                'key' => 'value',
            ],
        ));

        $this->assertFalse($response->failed());
        $this->assertSame($response->getRequest()->getMethod(), Method::POST);
        $this->assertIsArray($response->json());
        $this->assertArrayHasKey('success', $response->json());
    }
}
