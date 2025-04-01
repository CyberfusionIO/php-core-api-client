<?php

namespace Cyberfusion\CoreApi\Requests\VirtualHosts;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\DetailMessage;
use Cyberfusion\CoreApi\Models\ValidationError;
use Cyberfusion\CoreApi\Models\VirtualHostCreateRequest;
use Cyberfusion\CoreApi\Models\VirtualHostResource;
use Cyberfusion\CoreApi\Support\DtoBuilder;
use Cyberfusion\CoreApi\Support\UrlBuilder;
use Illuminate\Support\Collection;
use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Compatible cluster groups: * Web The following combinations of attributes are unique: - `domain`
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
        return UrlBuilder::for('/api/v1/virtual-hosts')->getEndpoint();
    }

    public function defaultBody(): array
    {
        return $this->virtualHostCreateRequest->toArray();
    }

    /**
     * @throws JsonException
     * @returns VirtualHostResource|DetailMessage|Collection<ValidationError>
     */
    public function createDtoFromResponse(Response $response): VirtualHostResource|DetailMessage|Collection
    {
        return DtoBuilder::for($response, VirtualHostResource::class)->build();
    }
}
