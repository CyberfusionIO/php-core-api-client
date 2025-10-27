<?php

namespace Cyberfusion\CoreApi\Requests\FTPUsers;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\FTPUserCreateRequest;
use Cyberfusion\CoreApi\Models\FTPUserResource;
use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

/**
 * The following combinations of attributes are unique: - `name`
 */
class CreateFTPUser extends Request implements CoreApiRequestContract, HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        private readonly FTPUserCreateRequest $fTPUserCreateRequest,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/v1/ftp-users';
    }

    public function defaultBody(): array
    {
        return $this->fTPUserCreateRequest->toArray();
    }

    /**
     * @throws JsonException
     * @returns FTPUserResource
     */
    public function createDtoFromResponse(Response $response): FTPUserResource
    {
        return FTPUserResource::fromArray($response->json());
    }
}
