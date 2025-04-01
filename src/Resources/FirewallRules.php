<?php

namespace Cyberfusion\CoreApi\Resources;

use Cyberfusion\CoreApi\Models\FirewallRuleCreateRequest;
use Cyberfusion\CoreApi\Requests\FirewallRules\CreateFirewallRule;
use Cyberfusion\CoreApi\Requests\FirewallRules\DeleteFirewallRule;
use Cyberfusion\CoreApi\Requests\FirewallRules\ListFirewallRules;
use Cyberfusion\CoreApi\Requests\FirewallRules\ReadFirewallRule;
use Cyberfusion\CoreApi\Support\Filter;
use Cyberfusion\CoreApi\Support\Sorter;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;

class FirewallRules extends BaseResource
{
    public function createFirewallRule(FirewallRuleCreateRequest $firewallRuleCreateRequest): Response
    {
        return $this->connector->send(new CreateFirewallRule($firewallRuleCreateRequest));
    }

    public function listFirewallRules(
        ?int $skip = null,
        ?int $limit = null,
        ?Filter $filter = null,
        ?Sorter $sort = null,
    ): Response {
        return $this->connector->send(new ListFirewallRules($skip, $limit, $filter, $sort));
    }

    public function readFirewallRule(int $id): Response
    {
        return $this->connector->send(new ReadFirewallRule($id));
    }

    public function deleteFirewallRule(int $id): Response
    {
        return $this->connector->send(new DeleteFirewallRule($id));
    }
}
