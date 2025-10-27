<?php

namespace Cyberfusion\CoreApi\Requests\RootSSHKeys;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\RootSSHKeyCreatePublicRequest;
use Cyberfusion\CoreApi\Models\RootSSHKeyResource;
use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

/**
 * The following combinations of attributes are unique: - `name`
 */
class CreatePublicRootSSHKey extends Request implements CoreApiRequestContract, HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        private readonly RootSSHKeyCreatePublicRequest $rootSSHKeyCreatePublicRequest,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/v1/root-ssh-keys/public';
    }

    public function defaultBody(): array
    {
        return $this->rootSSHKeyCreatePublicRequest->toArray();
    }

    /**
     * @throws JsonException
     * @returns RootSSHKeyResource
     */
    public function createDtoFromResponse(Response $response): RootSSHKeyResource
    {
        return RootSSHKeyResource::fromArray($response->json());
    }
}
