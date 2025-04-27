<?php

namespace Cyberfusion\CoreApi\Requests\SSHKeys;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\SSHKeyCreatePrivateRequest;
use Cyberfusion\CoreApi\Models\SSHKeyResource;
use Cyberfusion\CoreApi\Support\UrlBuilder;
use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class CreatePrivateSSHKey extends Request implements CoreApiRequestContract, HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        private readonly SSHKeyCreatePrivateRequest $sSHKeyCreatePrivateRequest,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return UrlBuilder::for('/api/v1/ssh-keys/private')->getEndpoint();
    }

    public function defaultBody(): array
    {
        return $this->sSHKeyCreatePrivateRequest->toArray();
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
