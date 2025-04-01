<?php

namespace Cyberfusion\CoreApi\Requests\VirtualHosts;

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
 * Sync one virtual host domain root to another. Usually used to clone websites/applications to and from separate production and staging environments. The right virtual host (destination) is made identical to the left virtual host (source), except excluded paths (`exclude_paths`). Sync Toolkit must be enabled on the cluster(s) of the left and right virtual host clusters (`sync_toolkit_enabled`).
 */
class SyncDomainRootsOfVirtualHosts extends Request implements CoreApiRequestContract
{
    protected Method $method = Method::POST;

    public function __construct(
        private readonly int $leftVirtualHostId,
        private readonly int $rightVirtualHostId,
        private readonly ?string $callbackUrl = null,
        private readonly ?array $excludePaths = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return UrlBuilder::for('/api/v1/virtual-hosts/%d/domain-root/sync')
            ->addPathParameter($this->leftVirtualHostId)
            ->addQueryParameter('callback_url', $this->callbackUrl)
            ->addQueryParameter('right_virtual_host_id', $this->rightVirtualHostId)
            ->addQueryParameter('exclude_paths', $this->excludePaths)
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
