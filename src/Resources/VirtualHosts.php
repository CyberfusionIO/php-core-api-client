<?php

namespace Cyberfusion\CoreApi\Resources;

use Cyberfusion\CoreApi\CoreApiResource;
use Cyberfusion\CoreApi\Enums\LogSortOrderEnum;
use Cyberfusion\CoreApi\Models\VirtualHostCreateRequest;
use Cyberfusion\CoreApi\Models\VirtualHostUpdateRequest;
use Cyberfusion\CoreApi\Models\VirtualHostsSearchRequest;
use Cyberfusion\CoreApi\Requests\VirtualHosts\CreateVirtualHost;
use Cyberfusion\CoreApi\Requests\VirtualHosts\DeleteVirtualHost;
use Cyberfusion\CoreApi\Requests\VirtualHosts\GetVirtualHostDocumentRoot;
use Cyberfusion\CoreApi\Requests\VirtualHosts\ListAccessLogs;
use Cyberfusion\CoreApi\Requests\VirtualHosts\ListErrorLogs;
use Cyberfusion\CoreApi\Requests\VirtualHosts\ListVirtualHosts;
use Cyberfusion\CoreApi\Requests\VirtualHosts\ReadVirtualHost;
use Cyberfusion\CoreApi\Requests\VirtualHosts\SyncDomainRootsOfVirtualHosts;
use Cyberfusion\CoreApi\Requests\VirtualHosts\UpdateVirtualHost;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\Paginator;

class VirtualHosts extends CoreApiResource
{
    public function createVirtualHost(VirtualHostCreateRequest $virtualHostCreateRequest): Response
    {
        return $this->connector->send(new CreateVirtualHost($virtualHostCreateRequest));
    }

    public function listVirtualHosts(
        ?VirtualHostsSearchRequest $includeFilters = null,
        array $includes = [],
    ): Paginator {
        return $this->connector->paginate(new ListVirtualHosts($includeFilters, $includes));
    }

    public function readVirtualHost(int $id, array $includes = []): Response
    {
        return $this->connector->send(new ReadVirtualHost($id, $includes));
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

    public function listAccessLogs(
        int $id,
        ?string $timestamp = null,
        ?LogSortOrderEnum $sort = null,
        ?int $limit = null,
    ): Response {
        return $this->connector->send(new ListAccessLogs($id, $timestamp, $sort, $limit));
    }

    public function listErrorLogs(
        int $id,
        ?string $timestamp = null,
        ?LogSortOrderEnum $sort = null,
        ?int $limit = null,
    ): Response {
        return $this->connector->send(new ListErrorLogs($id, $timestamp, $sort, $limit));
    }
}
