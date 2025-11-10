<?php

namespace Cyberfusion\CoreApi\Requests\FtpUsers;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\FtpUserCreateRequest;
use Cyberfusion\CoreApi\Models\FtpUserResource;
use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

/**
 * The following combinations of attributes are unique: - `name`
 */
class CreateFtpUser extends Request implements CoreApiRequestContract, HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        private readonly FtpUserCreateRequest $ftpUserCreateRequest,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/v1/ftp-users';
    }

    public function defaultBody(): array
    {
        return $this->ftpUserCreateRequest->toArray();
    }

    /**
     * @throws JsonException
     * @returns FtpUserResource
     */
    public function createDtoFromResponse(Response $response): FtpUserResource
    {
        return FtpUserResource::fromArray($response->json());
    }
}
