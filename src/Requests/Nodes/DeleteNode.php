<?php

namespace Cyberfusion\CoreApi\Requests\Nodes;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\DetailMessage;
use Cyberfusion\CoreApi\Models\ValidationError;
use Cyberfusion\CoreApi\Support\DtoBuilder;
use Cyberfusion\CoreApi\Support\UrlBuilder;
use Illuminate\Support\Collection;
use JsonException;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

/**
 * If the node is master for any group (see `is_master` in `groups_properties`), another node in the cluster must have the same group. The master role will then be 'donated' to it. The following related objects will be automatically deleted: - HAProxy Listens to Nodes - Node Add-Ons - API Keys
 */
class DeleteNode extends Request implements CoreApiRequestContract
{
    protected Method $method = Method::DELETE;

    public function __construct(
        private readonly int $id,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return UrlBuilder::for('/api/v1/nodes/%d')
            ->addPathParameter($this->id)
            ->getEndpoint();
    }

    /**
     * @throws JsonException
     * @returns DetailMessage|Collection<ValidationError>
     */
    public function createDtoFromResponse(Response $response): DetailMessage|DetailMessage|Collection
    {
        return DtoBuilder::for($response, DetailMessage::class)->build();
    }
}
