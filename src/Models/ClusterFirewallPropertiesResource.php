<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class ClusterFirewallPropertiesResource extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function __construct(
        int $id,
        string $createdAt,
        string $updatedAt,
        bool $firewallRulesExternalProvidersEnabled,
        int $clusterId,
        ClusterFirewallPropertiesIncludes $includes,
    ) {
        $this->setId($id);
        $this->setCreatedAt($createdAt);
        $this->setUpdatedAt($updatedAt);
        $this->setFirewallRulesExternalProvidersEnabled($firewallRulesExternalProvidersEnabled);
        $this->setClusterId($clusterId);
        $this->setIncludes($includes);
    }

    public function getId(): int
    {
        return $this->getAttribute('id');
    }

    public function setId(int $id): self
    {
        $this->setAttribute('id', $id);
        return $this;
    }

    public function getCreatedAt(): string
    {
        return $this->getAttribute('created_at');
    }

    public function setCreatedAt(string $createdAt): self
    {
        $this->setAttribute('created_at', $createdAt);
        return $this;
    }

    public function getUpdatedAt(): string
    {
        return $this->getAttribute('updated_at');
    }

    public function setUpdatedAt(string $updatedAt): self
    {
        $this->setAttribute('updated_at', $updatedAt);
        return $this;
    }

    public function getFirewallRulesExternalProvidersEnabled(): bool
    {
        return $this->getAttribute('firewall_rules_external_providers_enabled');
    }

    public function setFirewallRulesExternalProvidersEnabled(bool $firewallRulesExternalProvidersEnabled): self
    {
        $this->setAttribute('firewall_rules_external_providers_enabled', $firewallRulesExternalProvidersEnabled);
        return $this;
    }

    public function getClusterId(): int
    {
        return $this->getAttribute('cluster_id');
    }

    public function setClusterId(int $clusterId): self
    {
        $this->setAttribute('cluster_id', $clusterId);
        return $this;
    }

    public function getIncludes(): ClusterFirewallPropertiesIncludes
    {
        return $this->getAttribute('includes');
    }

    public function setIncludes(ClusterFirewallPropertiesIncludes $includes): self
    {
        $this->setAttribute('includes', $includes);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            id: Arr::get($data, 'id'),
            createdAt: Arr::get($data, 'created_at'),
            updatedAt: Arr::get($data, 'updated_at'),
            firewallRulesExternalProvidersEnabled: Arr::get($data, 'firewall_rules_external_providers_enabled'),
            clusterId: Arr::get($data, 'cluster_id'),
            includes: ClusterFirewallPropertiesIncludes::fromArray(Arr::get($data, 'includes')),
        ));
    }
}
