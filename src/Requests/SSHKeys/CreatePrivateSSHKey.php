<?php

namespace Cyberfusion\CoreApi\Requests\SSHKeys;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\DetailMessage;
use Cyberfusion\CoreApi\Models\SSHKeyCreatePrivateRequest;
use Cyberfusion\CoreApi\Models\SSHKeyResource;
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
     * @returns SSHKeyResource|DetailMessage|Collection<ValidationError>
     */
    public function createDtoFromResponse(Response $response): SSHKeyResource|DetailMessage|Collection
    {
        return DtoBuilder::for($response, SSHKeyResource::class)->build();
    }
}
