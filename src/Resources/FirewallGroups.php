<?php

namespace Cyberfusion\CoreApi\Resources;

use Cyberfusion\CoreApi\CoreApiResource;
use Cyberfusion\CoreApi\Models\FirewallGroupCreateRequest;
use Cyberfusion\CoreApi\Models\FirewallGroupUpdateRequest;
use Cyberfusion\CoreApi\Models\FirewallGroupsSearchRequest;
use Cyberfusion\CoreApi\Requests\FirewallGroups\CreateFirewallGroup;
use Cyberfusion\CoreApi\Requests\FirewallGroups\DeleteFirewallGroup;
use Cyberfusion\CoreApi\Requests\FirewallGroups\ListFirewallGroups;
use Cyberfusion\CoreApi\Requests\FirewallGroups\ReadFirewallGroup;
use Cyberfusion\CoreApi\Requests\FirewallGroups\UpdateFirewallGroup;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\Paginator;

class FirewallGroups extends CoreApiResource
{
    public function createFirewallGroup(FirewallGroupCreateRequest $firewallGroupCreateRequest): Response
    {
        return $this->connector->send(new CreateFirewallGroup($firewallGroupCreateRequest));
    }

    public function listFirewallGroups(?FirewallGroupsSearchRequest $includeFilters = null): Paginator
    {
        return $this->connector->paginate(new ListFirewallGroups($includeFilters));
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
