<?php

namespace Cyberfusion\CoreApi\Requests\NodeAddOns;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\NodeAddOnCreateRequest;
use Cyberfusion\CoreApi\Models\TaskCollectionResource;
use Cyberfusion\CoreApi\Support\UrlBuilder;
use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

/**
 * > ⚠️ Calling this endpoint incurs charges depending on the specified `product`. Disk node add-ons cannot be deleted.
 */
class CreateNodeAddOn extends Request implements CoreApiRequestContract, HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        private readonly NodeAddOnCreateRequest $nodeAddOnCreateRequest,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return UrlBuilder::for('/api/v1/node-add-ons')->getEndpoint();
    }

    public function defaultBody(): array
    {
        return $this->nodeAddOnCreateRequest->toArray();
    }

    /**
     * @throws JsonException
     * @returns TaskCollectionResource
     */
    public function createDtoFromResponse(Response $response): TaskCollectionResource
    {
        return TaskCollectionResource::fromArray($response->json());
    }
}
