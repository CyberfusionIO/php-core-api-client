<?php

namespace Cyberfusion\CoreApi\Requests\FtpUsers;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\FtpUserResource;
use Cyberfusion\CoreApi\Models\FtpUserUpdateRequest;
use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class UpdateFtpUser extends Request implements CoreApiRequestContract, HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PATCH;

    public function __construct(
        private readonly int $id,
        private readonly FtpUserUpdateRequest $ftpUserUpdateRequest,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return sprintf('/api/v1/ftp-users/%d', $this->id);
    }

    public function defaultBody(): array
    {
        return $this->ftpUserUpdateRequest->toArray();
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
