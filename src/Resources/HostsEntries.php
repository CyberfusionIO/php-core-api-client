<?php

namespace Cyberfusion\CoreApi\Resources;

use Cyberfusion\CoreApi\Models\HostsEntryCreateRequest;
use Cyberfusion\CoreApi\Requests\HostsEntries\CreateHostsEntry;
use Cyberfusion\CoreApi\Requests\HostsEntries\DeleteHostsEntry;
use Cyberfusion\CoreApi\Requests\HostsEntries\ListHostsEntries;
use Cyberfusion\CoreApi\Requests\HostsEntries\ReadHostsEntry;
use Cyberfusion\CoreApi\Support\Filter;
use Cyberfusion\CoreApi\Support\Sorter;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;

class HostsEntries extends BaseResource
{
    public function createHostsEntry(HostsEntryCreateRequest $hostsEntryCreateRequest): Response
    {
        return $this->connector->send(new CreateHostsEntry($hostsEntryCreateRequest));
    }

    public function listHostsEntries(
        ?int $skip = null,
        ?int $limit = null,
        ?Filter $filter = null,
        ?Sorter $sort = null,
    ): Response {
        return $this->connector->send(new ListHostsEntries($skip, $limit, $filter, $sort));
    }

    public function readHostsEntry(int $id): Response
    {
        return $this->connector->send(new ReadHostsEntry($id));
    }

    public function deleteHostsEntry(int $id): Response
    {
        return $this->connector->send(new DeleteHostsEntry($id));
    }
}
