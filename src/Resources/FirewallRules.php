<?php

namespace Cyberfusion\CoreApi\Resources;

use Cyberfusion\CoreApi\CoreApiResource;
use Cyberfusion\CoreApi\Models\FirewallRuleCreateRequest;
use Cyberfusion\CoreApi\Models\FirewallRulesSearchRequest;
use Cyberfusion\CoreApi\Requests\FirewallRules\CreateFirewallRule;
use Cyberfusion\CoreApi\Requests\FirewallRules\DeleteFirewallRule;
use Cyberfusion\CoreApi\Requests\FirewallRules\ListFirewallRules;
use Cyberfusion\CoreApi\Requests\FirewallRules\ReadFirewallRule;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\Paginator;

class FirewallRules extends CoreApiResource
{
    public function createFirewallRule(FirewallRuleCreateRequest $firewallRuleCreateRequest): Response
    {
        return $this->connector->send(new CreateFirewallRule($firewallRuleCreateRequest));
    }

    public function listFirewallRules(?FirewallRulesSearchRequest $includeFilters = null): Paginator
    {
        return $this->connector->paginate(new ListFirewallRules($includeFilters));
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
