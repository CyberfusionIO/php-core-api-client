<?php

namespace Cyberfusion\CoreApi\Resources;

use Cyberfusion\CoreApi\CoreApiResource;
use Cyberfusion\CoreApi\Models\HostsEntriesSearchRequest;
use Cyberfusion\CoreApi\Models\HostsEntryCreateRequest;
use Cyberfusion\CoreApi\Requests\HostsEntries\CreateHostsEntry;
use Cyberfusion\CoreApi\Requests\HostsEntries\DeleteHostsEntry;
use Cyberfusion\CoreApi\Requests\HostsEntries\ListHostsEntries;
use Cyberfusion\CoreApi\Requests\HostsEntries\ReadHostsEntry;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\Paginator;

class HostsEntries extends CoreApiResource
{
    public function createHostsEntry(HostsEntryCreateRequest $hostsEntryCreateRequest): Response
    {
        return $this->connector->send(new CreateHostsEntry($hostsEntryCreateRequest));
    }

    public function listHostsEntries(
        ?HostsEntriesSearchRequest $includeFilters = null,
        array $includes = [],
    ): Paginator {
        return $this->connector->paginate(new ListHostsEntries($includeFilters, $includes));
    }

    public function readHostsEntry(int $id, array $includes = []): Response
    {
        return $this->connector->send(new ReadHostsEntry($id, $includes));
    }

    public function deleteHostsEntry(int $id): Response
    {
        return $this->connector->send(new DeleteHostsEntry($id));
    }
}
