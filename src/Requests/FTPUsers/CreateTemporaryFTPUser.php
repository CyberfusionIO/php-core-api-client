<?php

namespace Cyberfusion\CoreApi\Requests\FTPUsers;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\DetailMessage;
use Cyberfusion\CoreApi\Models\TemporaryFTPUserCreateRequest;
use Cyberfusion\CoreApi\Models\TemporaryFTPUserResource;
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
 * This endpoint allows you to use an online file manager (`file_manager_url` in response). Temporary FTP users differ from regular FTP users in the following ways: - Username and password are auto-generated. - Automatically expire after 1 hour. - Not created as an API object. I.e. not returned in regular 'FTP users' API output. - Created on the cluster by the time the HTTP request is finished. For regular FTP users / API objects, there is a slight delay.
 */
class CreateTemporaryFTPUser extends Request implements CoreApiRequestContract, HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        private readonly TemporaryFTPUserCreateRequest $temporaryFTPUserCreateRequest,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return UrlBuilder::for('/api/v1/ftp-users/temporary')->getEndpoint();
    }

    public function defaultBody(): array
    {
        return $this->temporaryFTPUserCreateRequest->toArray();
    }

    /**
     * @throws JsonException
     * @returns TemporaryFTPUserResource|DetailMessage|Collection<ValidationError>
     */
    public function createDtoFromResponse(Response $response): TemporaryFTPUserResource|DetailMessage|Collection
    {
        return DtoBuilder::for($response, TemporaryFTPUserResource::class)->build();
    }
}
