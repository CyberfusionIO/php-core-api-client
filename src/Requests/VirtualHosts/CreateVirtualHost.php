<?php

namespace Cyberfusion\CoreApi\Requests\VirtualHosts;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\VirtualHostCreateRequest;
use Cyberfusion\CoreApi\Models\VirtualHostResource;
use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

/**
 * The following combinations of attributes are unique: - `domain`
 */
class CreateVirtualHost extends Request implements CoreApiRequestContract, HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        private readonly VirtualHostCreateRequest $virtualHostCreateRequest,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/v1/virtual-hosts';
    }

    public function defaultBody(): array
    {
        return $this->virtualHostCreateRequest->toArray();
    }

    /**
     * @throws JsonException
     * @returns VirtualHostResource
     */
    public function createDtoFromResponse(Response $response): VirtualHostResource
    {
        return VirtualHostResource::fromArray($response->json());
    }
}
