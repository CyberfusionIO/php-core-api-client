<?php

namespace Cyberfusion\CoreApi\Requests\HtpasswdUsers;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\HtpasswdUserResource;
use JsonException;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class ReadHtpasswdUser extends Request implements CoreApiRequestContract
{
    protected Method $method = Method::GET;

    public function __construct(
        private readonly int $id,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return sprintf('/api/v1/htpasswd-users/%d', $this->id);
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
