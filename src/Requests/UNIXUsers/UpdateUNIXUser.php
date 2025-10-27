<?php

namespace Cyberfusion\CoreApi\Requests\UNIXUsers;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\UNIXUserResource;
use Cyberfusion\CoreApi\Models\UNIXUserUpdateRequest;
use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class UpdateUNIXUser extends Request implements CoreApiRequestContract, HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PATCH;

    public function __construct(
        private readonly int $id,
        private readonly UNIXUserUpdateRequest $uNIXUserUpdateRequest,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return sprintf('/api/v1/unix-users/%d', $this->id);
    }

    public function defaultBody(): array
    {
        return $this->uNIXUserUpdateRequest->toArray();
    }

    /**
     * @throws JsonException
     * @returns UNIXUserResource
     */
    public function createDtoFromResponse(Response $response): UNIXUserResource
    {
        return UNIXUserResource::fromArray($response->json());
    }
}
