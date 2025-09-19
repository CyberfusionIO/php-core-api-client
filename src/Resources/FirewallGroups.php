<?php

namespace Cyberfusion\CoreApi\Resources;

use Cyberfusion\CoreApi\Models\FirewallGroupCreateRequest;
use Cyberfusion\CoreApi\Models\FirewallGroupUpdateRequest;
use Cyberfusion\CoreApi\Requests\FirewallGroups\CreateFirewallGroup;
use Cyberfusion\CoreApi\Requests\FirewallGroups\DeleteFirewallGroup;
use Cyberfusion\CoreApi\Requests\FirewallGroups\ListFirewallGroups;
use Cyberfusion\CoreApi\Requests\FirewallGroups\ReadFirewallGroup;
use Cyberfusion\CoreApi\Requests\FirewallGroups\UpdateFirewallGroup;
use Cyberfusion\CoreApi\Support\Filter;
use Cyberfusion\CoreApi\Support\Sorter;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;

class FirewallGroups extends BaseResource
{
    public function createFirewallGroup(FirewallGroupCreateRequest $firewallGroupCreateRequest): Response
    {
        return $this->connector->send(new CreateFirewallGroup($firewallGroupCreateRequest));
    }

    public function listFirewallGroups(
        ?int $skip = null,
        ?int $limit = null,
        ?Filter $filter = null,
        ?Sorter $sort = null,
    ): Response {
        return $this->connector->send(new ListFirewallGroups($skip, $limit, $filter, $sort));
    }

    public function readFirewallGroup(int $id): Response
    {
        return $this->connector->send(new ReadFirewallGroup($id));
    }

    public function updateFirewallGroup(int $id, FirewallGroupUpdateRequest $firewallGroupUpdateRequest): Response
    {
        return $this->connector->send(new UpdateFirewallGroup($id, $firewallGroupUpdateRequest));
    }

    public function deleteFirewallGroup(int $id): Response
    {
        return $this->connector->send(new DeleteFirewallGroup($id));
    }
}
