<?php

namespace Cyberfusion\CoreApi\Requests\HtpasswdUsers;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\HtpasswdUserCreateRequest;
use Cyberfusion\CoreApi\Models\HtpasswdUserResource;
use Cyberfusion\CoreApi\Support\UrlBuilder;
use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

/**
 * The following combinations of attributes are unique: - `username` + `htpasswd_file_id`
 */
class CreateHtpasswdUser extends Request implements CoreApiRequestContract, HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        private readonly HtpasswdUserCreateRequest $htpasswdUserCreateRequest,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return UrlBuilder::for('/api/v1/htpasswd-users')->getEndpoint();
    }

    public function defaultBody(): array
    {
        return $this->htpasswdUserCreateRequest->toArray();
    }

    /**
     * @throws JsonException
     * @returns HtpasswdUserResource
     */
    public function createDtoFromResponse(Response $response): HtpasswdUserResource
    {
        return HtpasswdUserResource::fromArray($response->json());
    }
}
