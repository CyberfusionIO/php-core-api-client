<?php

namespace Cyberfusion\CoreApi\Requests\FTPUsers;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\DetailMessage;
use Cyberfusion\CoreApi\Models\FTPUserCreateRequest;
use Cyberfusion\CoreApi\Models\FTPUserResource;
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
 * Compatible cluster groups: * Web The following combinations of attributes are unique: - `name`
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
        return UrlBuilder::for('/api/v1/ftp-users')->getEndpoint();
    }

    public function defaultBody(): array
    {
        return $this->fTPUserCreateRequest->toArray();
    }

    /**
     * @throws JsonException
     * @returns FTPUserResource|DetailMessage|Collection<ValidationError>
     */
    public function createDtoFromResponse(Response $response): FTPUserResource|DetailMessage|Collection
    {
        return DtoBuilder::for($response, FTPUserResource::class)->build();
    }
}
