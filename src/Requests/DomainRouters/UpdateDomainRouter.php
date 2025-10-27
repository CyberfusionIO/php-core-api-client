<?php

namespace Cyberfusion\CoreApi\Requests\DomainRouters;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\DomainRouterResource;
use Cyberfusion\CoreApi\Models\DomainRouterUpdateRequest;
use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class UpdateDomainRouter extends Request implements CoreApiRequestContract, HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PATCH;

    public function __construct(
        private readonly int $id,
        private readonly DomainRouterUpdateRequest $domainRouterUpdateRequest,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return sprintf('/api/v1/domain-routers/%d', $this->id);
    }

    public function defaultBody(): array
    {
        return $this->domainRouterUpdateRequest->toArray();
    }

    /**
     * @throws JsonException
     * @returns DomainRouterResource
     */
    public function createDtoFromResponse(Response $response): DomainRouterResource
    {
        return DomainRouterResource::fromArray($response->json());
    }
}
