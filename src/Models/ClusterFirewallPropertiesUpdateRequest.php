<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class ClusterFirewallPropertiesUpdateRequest extends CoreApiModel implements CoreApiModelContract
{
    public function __construct()
    {
    }

    public function getFirewallRulesExternalProvidersEnabled(): bool|null
    {
        return $this->getAttribute('firewall_rules_external_providers_enabled');
    }

    public function setFirewallRulesExternalProvidersEnabled(?bool $firewallRulesExternalProvidersEnabled): self
    {
        $this->setAttribute('firewall_rules_external_providers_enabled', $firewallRulesExternalProvidersEnabled);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
        ))
            ->setFirewallRulesExternalProvidersEnabled(Arr::get($data, 'firewall_rules_external_providers_enabled'));
    }
}
