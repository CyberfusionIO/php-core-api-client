<?php

namespace Cyberfusion\CoreApi\Requests\SshKeys;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\SshKeyCreatePublicRequest;
use Cyberfusion\CoreApi\Models\SshKeyResource;
use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

/**
 * When adding a public SSH key for a UNIX user which belongs to a cluster with the 'Borg Server' group, note that the public SSH key is not able to access the UNIX user using a regular shell. The public SSH key is granted for access to the Borg repository only. The following combinations of attributes are unique: - `name`
 */
class CreatePublicSshKey extends Request implements CoreApiRequestContract, HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        private readonly SshKeyCreatePublicRequest $sshKeyCreatePublicRequest,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/v1/ssh-keys/public';
    }

    public function defaultBody(): array
    {
        return $this->sshKeyCreatePublicRequest->toArray();
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
