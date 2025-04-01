<?php

namespace Cyberfusion\CoreApi\Requests\Nodes;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\DetailMessage;
use Cyberfusion\CoreApi\Models\TaskCollectionResource;
use Cyberfusion\CoreApi\Models\ValidationError;
use Cyberfusion\CoreApi\Support\DtoBuilder;
use Cyberfusion\CoreApi\Support\UrlBuilder;
use Illuminate\Support\Collection;
use JsonException;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

/**
 * > ⚠️ Calling this endpoint incurs charges depending on the specified `product`.
 */
class UpgradeOrDowngradeNode extends Request implements CoreApiRequestContract
{
    protected Method $method = Method::POST;

    public function __construct(
        private readonly int $id,
        private readonly string $product,
        private readonly ?string $callbackUrl = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return UrlBuilder::for('/api/v1/nodes/%d/xgrade')
            ->addPathParameter($this->id)
            ->addQueryParameter('callback_url', $this->callbackUrl)
            ->addQueryParameter('product', $this->product)
            ->getEndpoint();
    }

    /**
     * @throws JsonException
     * @returns TaskCollectionResource|DetailMessage|Collection<ValidationError>
     */
    public function createDtoFromResponse(Response $response): TaskCollectionResource|DetailMessage|Collection
    {
        return DtoBuilder::for($response, TaskCollectionResource::class)->build();
    }
}
