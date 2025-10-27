<?php

namespace Cyberfusion\CoreApi\Requests\SSHKeys;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\SSHKeyResource;
use JsonException;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class ReadSSHKey extends Request implements CoreApiRequestContract
{
    protected Method $method = Method::GET;

    public function __construct(
        private readonly int $id,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return sprintf('/api/v1/ssh-keys/%d', $this->id);
    }

    /**
     * @throws JsonException
     * @returns SSHKeyResource
     */
    public function createDtoFromResponse(Response $response): SSHKeyResource
    {
        return SSHKeyResource::fromArray($response->json());
    }
}
