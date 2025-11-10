<?php

namespace Cyberfusion\CoreApi\Requests\FtpUsers;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\TemporaryFtpUserCreateRequest;
use Cyberfusion\CoreApi\Models\TemporaryFtpUserResource;
use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

/**
 * This endpoint allows you to use an online file manager (`file_manager_url` in response). Temporary FTP users differ from regular FTP users in the following ways: - Username and password are auto-generated. - Automatically expire after 1 hour. - Not created as an API object. I.e. not returned in regular 'FTP users' API output. - Created on the cluster by the time the HTTP request is finished. For regular FTP users / API objects, there is a slight delay.
 */
class CreateTemporaryFtpUser extends Request implements CoreApiRequestContract, HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        private readonly TemporaryFtpUserCreateRequest $temporaryFtpUserCreateRequest,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/v1/ftp-users/temporary';
    }

    public function defaultBody(): array
    {
        return $this->temporaryFtpUserCreateRequest->toArray();
    }

    /**
     * @throws JsonException
     * @returns TemporaryFtpUserResource
     */
    public function createDtoFromResponse(Response $response): TemporaryFtpUserResource
    {
        return TemporaryFtpUserResource::fromArray($response->json());
    }
}
