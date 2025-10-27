<?php

namespace Cyberfusion\CoreApi\Requests\UNIXUsers;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\UNIXUserCreateRequest;
use Cyberfusion\CoreApi\Models\UNIXUserResource;
use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

/**
 * The following combinations of attributes are unique: - `username` + `cluster_id` > ⚠️ Disk usage by UNIX users is billed per GiB. > See https://cyberfusion.io/content/full-product-list for current prices. > Get current and past usage with the ['Read UNIX User Usages' endpoint](#tag/UNIX-Users/operation/read_unix_user_usages_api_v1_unix_users_usages__unix_user_id__get).
 */
class CreateUNIXUser extends Request implements CoreApiRequestContract, HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        private readonly UNIXUserCreateRequest $uNIXUserCreateRequest,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/v1/unix-users';
    }

    public function defaultBody(): array
    {
        return $this->uNIXUserCreateRequest->toArray();
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
