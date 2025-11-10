<?php

namespace Cyberfusion\CoreApi\Requests\RootSshKeys;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\RootSshKeyCreatePrivateRequest;
use Cyberfusion\CoreApi\Models\RootSshKeyResource;
use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class CreatePrivateRootSshKey extends Request implements CoreApiRequestContract, HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        private readonly RootSshKeyCreatePrivateRequest $rootSshKeyCreatePrivateRequest,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/v1/root-ssh-keys/private';
    }

    public function defaultBody(): array
    {
        return $this->rootSshKeyCreatePrivateRequest->toArray();
    }

    /**
     * @throws JsonException
     * @returns RootSshKeyResource
     */
    public function createDtoFromResponse(Response $response): RootSshKeyResource
    {
        return RootSshKeyResource::fromArray($response->json());
    }
}
