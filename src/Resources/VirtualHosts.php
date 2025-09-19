<?php

namespace Cyberfusion\CoreApi\Resources;

use Cyberfusion\CoreApi\Models\VirtualHostCreateRequest;
use Cyberfusion\CoreApi\Models\VirtualHostUpdateRequest;
use Cyberfusion\CoreApi\Requests\VirtualHosts\CreateVirtualHost;
use Cyberfusion\CoreApi\Requests\VirtualHosts\DeleteVirtualHost;
use Cyberfusion\CoreApi\Requests\VirtualHosts\GetVirtualHostDocumentRoot;
use Cyberfusion\CoreApi\Requests\VirtualHosts\ListVirtualHosts;
use Cyberfusion\CoreApi\Requests\VirtualHosts\ReadVirtualHost;
use Cyberfusion\CoreApi\Requests\VirtualHosts\SyncDomainRootsOfVirtualHosts;
use Cyberfusion\CoreApi\Requests\VirtualHosts\UpdateVirtualHost;
use Cyberfusion\CoreApi\Support\Filter;
use Cyberfusion\CoreApi\Support\Sorter;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;

class VirtualHosts extends BaseResource
{
    public function createVirtualHost(VirtualHostCreateRequest $virtualHostCreateRequest): Response
    {
        return $this->connector->send(new CreateVirtualHost($virtualHostCreateRequest));
    }

    public function listVirtualHosts(
        ?int $skip = null,
        ?int $limit = null,
        ?Filter $filter = null,
        ?Sorter $sort = null,
    ): Response {
        return $this->connector->send(new ListVirtualHosts($skip, $limit, $filter, $sort));
    }

    public function readVirtualHost(int $id): Response
    {
        return $this->connector->send(new ReadVirtualHost($id));
    }

    public function updateVirtualHost(int $id, VirtualHostUpdateRequest $virtualHostUpdateRequest): Response
    {
        return $this->connector->send(new UpdateVirtualHost($id, $virtualHostUpdateRequest));
    }

    public function deleteVirtualHost(int $id, ?bool $deleteOnCluster = null): Response
    {
        return $this->connector->send(new DeleteVirtualHost($id, $deleteOnCluster));
    }

    public function getVirtualHostDocumentRoot(int $id): Response
    {
        return $this->connector->send(new GetVirtualHostDocumentRoot($id));
    }

    public function syncDomainRootsOfVirtualHosts(
        int $leftVirtualHostId,
        int $rightVirtualHostId,
        ?string $callbackUrl = null,
        ?array $excludePaths = null,
    ): Response {
        return $this->connector->send(new SyncDomainRootsOfVirtualHosts($leftVirtualHostId, $rightVirtualHostId, $callbackUrl, $excludePaths));
    }
}
