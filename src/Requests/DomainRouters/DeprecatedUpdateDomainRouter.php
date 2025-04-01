<?php

namespace Cyberfusion\CoreApi\Requests\DomainRouters;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\DetailMessage;
use Cyberfusion\CoreApi\Models\DomainRouterResource;
use Cyberfusion\CoreApi\Models\DomainRouterUpdateDeprecatedRequest;
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

/**
 * The following properties can never be updated to a different value: * `domain` * `virtual_host_id` * `url_redirect_id` * `category`
 */
class DeprecatedUpdateDomainRouter extends Request implements CoreApiRequestContract, HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;

    public function __construct(
        private readonly int $id,
        private readonly DomainRouterUpdateDeprecatedRequest $domainRouterUpdateDeprecatedRequest,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return UrlBuilder::for('/api/v1/domain-routers/%d')
            ->addPathParameter($this->id)
            ->getEndpoint();
    }

    public function defaultBody(): array
    {
        return $this->domainRouterUpdateDeprecatedRequest->toArray();
    }

    /**
     * @throws JsonException
     * @returns DomainRouterResource|DetailMessage|Collection<ValidationError>
     */
    public function createDtoFromResponse(Response $response): DomainRouterResource|DetailMessage|Collection
    {
        return DtoBuilder::for($response, DomainRouterResource::class)->build();
    }
}
