<?php

namespace Cyberfusion\CoreApi\Requests\Nodes;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\DetailMessage;
use Cyberfusion\CoreApi\Models\NodeResource;
use Cyberfusion\CoreApi\Models\NodeUpdateDeprecatedRequest;
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
 * The following properties can never be updated to a different value: * `hostname` * `product` (use `POST /api/v1/nodes/{id}/xgrade` endpoint)
 */
class DeprecatedUpdateNode extends Request implements CoreApiRequestContract, HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;

    public function __construct(
        private readonly int $id,
        private readonly NodeUpdateDeprecatedRequest $nodeUpdateDeprecatedRequest,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return UrlBuilder::for('/api/v1/nodes/%d')
            ->addPathParameter($this->id)
            ->getEndpoint();
    }

    public function defaultBody(): array
    {
        return $this->nodeUpdateDeprecatedRequest->toArray();
    }

    /**
     * @throws JsonException
     * @returns NodeResource|DetailMessage|Collection<ValidationError>
     */
    public function createDtoFromResponse(Response $response): NodeResource|DetailMessage|Collection
    {
        return DtoBuilder::for($response, NodeResource::class)->build();
    }
}
