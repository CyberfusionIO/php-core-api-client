<?php

namespace Cyberfusion\CoreApi\Requests\SshKeys;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\SshKeyCreatePrivateRequest;
use Cyberfusion\CoreApi\Models\SshKeyResource;
use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class CreatePrivateSshKey extends Request implements CoreApiRequestContract, HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        private readonly SshKeyCreatePrivateRequest $sshKeyCreatePrivateRequest,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/v1/ssh-keys/private';
    }

    public function defaultBody(): array
    {
        return $this->sshKeyCreatePrivateRequest->toArray();
    }

    /**
     * @throws JsonException
     * @returns SshKeyResource
     */
    public function createDtoFromResponse(Response $response): SshKeyResource
    {
        return SshKeyResource::fromArray($response->json());
    }
}
