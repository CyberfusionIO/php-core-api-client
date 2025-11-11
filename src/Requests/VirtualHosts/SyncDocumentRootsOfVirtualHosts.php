<?php

namespace Cyberfusion\CoreApi\Requests\VirtualHosts;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\TaskCollectionResource;
use JsonException;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

/**
 * Sync one virtual host document root to another. Usually used to clone websites/applications to and from separate production and staging environments. The right virtual host (destination) is made identical to the left virtual host (source), except excluded paths (`exclude_paths`).
 */
class SyncDocumentRootsOfVirtualHosts extends Request implements CoreApiRequestContract
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
        return sprintf('/api/v1/virtual-hosts/%d/document-root/sync', $this->leftVirtualHostId);
    }

    protected function defaultQuery(): array
    {
        $parameters = [];
        $parameters['callback_url'] = $this->callbackUrl;
        $parameters['right_virtual_host_id'] = $this->rightVirtualHostId;
        $parameters['exclude_paths'] = $this->excludePaths;

        return array_filter($parameters);
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
