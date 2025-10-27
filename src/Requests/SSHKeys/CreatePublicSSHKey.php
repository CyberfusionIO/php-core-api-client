<?php

namespace Cyberfusion\CoreApi\Requests\SSHKeys;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\SSHKeyCreatePublicRequest;
use Cyberfusion\CoreApi\Models\SSHKeyResource;
use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

/**
 * When adding a public SSH key for a UNIX user which belongs to a cluster with the 'Borg Server' group, note that the public SSH key is not able to access the UNIX user using a regular shell. The public SSH key is granted for access to the Borg repository only. The following combinations of attributes are unique: - `name`
 */
class CreatePublicSSHKey extends Request implements CoreApiRequestContract, HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        private readonly SSHKeyCreatePublicRequest $sSHKeyCreatePublicRequest,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/v1/ssh-keys/public';
    }

    public function defaultBody(): array
    {
        return $this->sSHKeyCreatePublicRequest->toArray();
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
