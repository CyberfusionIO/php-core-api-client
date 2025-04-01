<?php

namespace Cyberfusion\CoreApi\Requests\HtpasswdUsers;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\DetailMessage;
use Cyberfusion\CoreApi\Models\HtpasswdUserCreateRequest;
use Cyberfusion\CoreApi\Models\HtpasswdUserResource;
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
 * Compatible cluster groups: * Web The following combinations of attributes are unique: - `username` + `htpasswd_file_id`
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
     * @returns HtpasswdUserResource|DetailMessage|Collection<ValidationError>
     */
    public function createDtoFromResponse(Response $response): HtpasswdUserResource|DetailMessage|Collection
    {
        return DtoBuilder::for($response, HtpasswdUserResource::class)->build();
    }
}
