<?php

namespace Cyberfusion\CoreApi\Tests\Unit\Support;

use Cyberfusion\CoreApi\CoreApiConnector;
use Cyberfusion\CoreApi\Models\MailDomainCreateRequest;
use Cyberfusion\CoreApi\Models\MailDomainResource;
use Cyberfusion\CoreApi\Models\ValidationError;
use Cyberfusion\CoreApi\Requests\Login\RequestAccessToken;
use Cyberfusion\CoreApi\Requests\MailDomains\CreateMailDomain;
use Cyberfusion\CoreApi\Requests\MailDomains\ListMailDomains;
use Cyberfusion\CoreApi\Tests\Unit\RequestTestCase;
use Illuminate\Support\Collection;
use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;

class DtoBuilderTestCase extends RequestTestCase
{
    public function test_it_builds_a_single_regular_dto(): void
    {
        $mockClient = MockClient::global([
            RequestAccessToken::class => MockResponse::make([
                'access_token' => 'access_allowed',
                'token_type' => 'bearer',
                'expires_in' => 3600,
            ]),
            CreateMailDomain::class => MockResponse::make([
                'id' => 1,
                'created_at' => '2019-08-24T14:15:22Z',
                'updated_at' => "2019-08-24T14:15:22Z",
                'cluster_id' => 1,
                'domain' => 'cyberfusion.io',
                'unix_user_id' => 1,
                'catch_all_forward_email_addresses' => [
                    'dev-null@cyberfusion.io',
                ],
                'is_local' => false,
            ]),
        ]);

        $connector = new CoreApiConnector(
            username: 'username',
            password: 'password'
        );
        $connector->withMockClient($mockClient);

        $response = $connector->send(new CreateMailDomain(new MailDomainCreateRequest(
            domain: 'cyberfusion.io',
            unixUserId: 1,
            isLocal: false,
            catchAllForwardEmailAddresses: ['dev-null@cyberfusion.io'],
        )));

        $dto = $response->dto();

        $this->assertInstanceOf(MailDomainResource::class, $dto);
        $this->assertSame($dto->getId(), 1);
        $this->assertSame($dto->getCreatedAt(), '2019-08-24T14:15:22Z');
        $this->assertSame($dto->getUpdatedAt(), '2019-08-24T14:15:22Z');
        $this->assertSame($dto->getClusterId(), 1);
        $this->assertSame($dto->getDomain(), 'cyberfusion.io');
        $this->assertSame($dto->getUnixUserId(), 1);
        $this->assertFalse($dto->getIsLocal());
        $this->assertTrue(in_array('dev-null@cyberfusion.io', $dto->getCatchAllForwardEmailAddresses(), true));
    }

    public function test_it_builds_a_collection_of_regular_dtos(): void
    {
        $mockClient = MockClient::global([
            RequestAccessToken::class => MockResponse::make([
                'access_token' => 'access_allowed',
                'token_type' => 'bearer',
                'expires_in' => 3600,
            ]),
            ListMailDomains::class => MockResponse::make([
                [
                    'id' => 1,
                    'created_at' => '2019-08-24T14:15:22Z',
                    'updated_at' => "2019-08-24T14:15:22Z",
                    'cluster_id' => 1,
                    'domain' => 'cyberfusion.io',
                    'unix_user_id' => 1,
                    'catch_all_forward_email_addresses' => [
                        'dev-null@cyberfusion.io',
                    ],
                    'is_local' => false,
                ],
                [
                    'id' => 2,
                    'created_at' => '2019-08-24T14:15:22Z',
                    'updated_at' => "2019-08-24T14:15:22Z",
                    'cluster_id' => 2,
                    'domain' => 'cyberfusion-status.io',
                    'unix_user_id' => 2,
                    'catch_all_forward_email_addresses' => [
                        'dev-null@cyberfusion-status.io',
                    ],
                    'is_local' => false,
                ]
            ]),
        ]);

        $connector = new CoreApiConnector(
            username: 'username',
            password: 'password'
        );
        $connector->withMockClient($mockClient);

        $response = $connector->send(new ListMailDomains());

        $dto = $response->dto();

        $this->assertInstanceOf(Collection::class, $dto);
        $this->assertSame($dto->first()->getId(), 1);
        $this->assertSame($dto->skip(1)->first()->getId(), 2);
    }

    public function test_it_returns_a_validation_error_dto(): void
    {
        $mockClient = MockClient::global([
            RequestAccessToken::class => MockResponse::make([
                'access_token' => 'access_allowed',
                'token_type' => 'bearer',
                'expires_in' => 3600,
            ]),
            CreateMailDomain::class => MockResponse::make(
                body: [
                    'detail' => [
                        [
                            'loc' => ['/somewhere/over/the/rainbow'],
                            'msg' => 'This is a validation error',
                            'type' => 'validation_error',
                        ]
                    ],
                ],
                status: 422,
            ),
        ]);

        $connector = new CoreApiConnector(
            username: 'username',
            password: 'password'
        );
        $connector->withMockClient($mockClient);

        $response = $connector->send(new CreateMailDomain(new MailDomainCreateRequest(
            domain: 'cyberfusion.io',
            unixUserId: 1,
            isLocal: false,
            catchAllForwardEmailAddresses: ['dev-null@cyberfusion.io'],
        )));

        $dto = $response->dto();

        $this->assertInstanceOf(Collection::class, $dto);
        $this->assertInstanceOf(ValidationError::class, $dto->first());
        $this->assertSame($dto->first()->getLoc()[0], '/somewhere/over/the/rainbow');
        $this->assertSame($dto->first()->getMsg(), 'This is a validation error');
        $this->assertSame($dto->first()->getType(), 'validation_error');
    }
}
