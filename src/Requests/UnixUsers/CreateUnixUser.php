<?php

namespace Cyberfusion\CoreApi\Requests\UnixUsers;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\UnixUserCreateRequest;
use Cyberfusion\CoreApi\Models\UnixUserResource;
use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

/**
 * The following combinations of attributes are unique: - `username` + `cluster_id` > ⚠️ Disk usage by UNIX users is billed per GiB. > See https://cyberfusion.io/content/full-product-list for current prices. > Get current and past usage with the ['Read UNIX User Usages' endpoint](#tag/UNIX-Users/operation/read_unix_user_usages_api_v1_unix_users_usages__unix_user_id__get).
 */
class CreateUnixUser extends Request implements CoreApiRequestContract, HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        private readonly UnixUserCreateRequest $unixUserCreateRequest,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/v1/unix-users';
    }

    public function defaultBody(): array
    {
        return $this->unixUserCreateRequest->toArray();
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
