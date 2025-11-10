<?php

namespace Cyberfusion\CoreApi\Requests\UnixUsers;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\UnixUserResource;
use Cyberfusion\CoreApi\Models\UnixUserUpdateRequest;
use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class UpdateUnixUser extends Request implements CoreApiRequestContract, HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PATCH;

    public function __construct(
        private readonly int $id,
        private readonly UnixUserUpdateRequest $unixUserUpdateRequest,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return sprintf('/api/v1/unix-users/%d', $this->id);
    }

    public function defaultBody(): array
    {
        return $this->unixUserUpdateRequest->toArray();
    }

    /**
     * @throws JsonException
     * @returns UnixUserResource
     */
    public function createDtoFromResponse(Response $response): UnixUserResource
    {
        return UnixUserResource::fromArray($response->json());
    }
}
