<?php

namespace Cyberfusion\CoreApi\Requests\RootSSHKeys;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\DetailMessage;
use Cyberfusion\CoreApi\Models\RootSSHKeyCreatePrivateRequest;
use Cyberfusion\CoreApi\Models\RootSSHKeyResource;
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

class CreatePrivateRootSSHKey extends Request implements CoreApiRequestContract, HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        private readonly RootSSHKeyCreatePrivateRequest $rootSSHKeyCreatePrivateRequest,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return UrlBuilder::for('/api/v1/root-ssh-keys/private')->getEndpoint();
    }

    public function defaultBody(): array
    {
        return $this->rootSSHKeyCreatePrivateRequest->toArray();
    }

    /**
     * @throws JsonException
     * @returns RootSSHKeyResource|DetailMessage|Collection<ValidationError>
     */
    public function createDtoFromResponse(Response $response): RootSSHKeyResource|DetailMessage|Collection
    {
        return DtoBuilder::for($response, RootSSHKeyResource::class)->build();
    }
}
