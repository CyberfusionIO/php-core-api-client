<?php

namespace Cyberfusion\CoreApi\Requests\FTPUsers;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\FTPUserResource;
use Cyberfusion\CoreApi\Models\FTPUserUpdateDeprecatedRequest;
use Cyberfusion\CoreApi\Support\UrlBuilder;
use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

/**
 * The following properties can never be updated to a different value: * `username`
 */
class DeprecatedUpdateFTPUser extends Request implements CoreApiRequestContract, HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;

    public function __construct(
        private readonly int $id,
        private readonly FTPUserUpdateDeprecatedRequest $fTPUserUpdateDeprecatedRequest,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return UrlBuilder::for('/api/v1/ftp-users/%d')
            ->addPathParameter($this->id)
            ->getEndpoint();
    }

    public function defaultBody(): array
    {
        return $this->fTPUserUpdateDeprecatedRequest->toArray();
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
