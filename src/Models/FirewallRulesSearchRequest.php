<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Enums\FirewallRuleExternalProviderNameEnum;
use Cyberfusion\CoreApi\Enums\FirewallRuleServiceNameEnum;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class FirewallRulesSearchRequest extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function getClusterId(): int|null
    {
        return $this->getAttribute('cluster_id');
    }

    public function setClusterId(?int $clusterId): self
    {
        $this->setAttribute('cluster_id', $clusterId);
        return $this;
    }

    public function getNodeId(): int|null
    {
        return $this->getAttribute('node_id');
    }

    public function setNodeId(?int $nodeId): self
    {
        $this->setAttribute('node_id', $nodeId);
        return $this;
    }

    public function getFirewallGroupId(): int|null
    {
        return $this->getAttribute('firewall_group_id');
    }

    public function setFirewallGroupId(?int $firewallGroupId): self
    {
        $this->setAttribute('firewall_group_id', $firewallGroupId);
        return $this;
    }

    public function getExternalProviderName(): FirewallRuleExternalProviderNameEnum|null
    {
        return $this->getAttribute('external_provider_name');
    }

    public function setExternalProviderName(?FirewallRuleExternalProviderNameEnum $externalProviderName): self
    {
        $this->setAttribute('external_provider_name', $externalProviderName);
        return $this;
    }

    public function getServiceName(): FirewallRuleServiceNameEnum|null
    {
        return $this->getAttribute('service_name');
    }

    public function setServiceName(?FirewallRuleServiceNameEnum $serviceName): self
    {
        $this->setAttribute('service_name', $serviceName);
        return $this;
    }

    public function getHaproxyListenId(): int|null
    {
        return $this->getAttribute('haproxy_listen_id');
    }

    public function setHaproxyListenId(?int $haproxyListenId): self
    {
        $this->setAttribute('haproxy_listen_id', $haproxyListenId);
        return $this;
    }

    public function getPort(): int|null
    {
        return $this->getAttribute('port');
    }

    public function setPort(?int $port): self
    {
        $this->setAttribute('port', $port);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
        ))
            ->when(Arr::has($data, 'cluster_id'), fn (self $model) => $model->setClusterId(Arr::get($data, 'cluster_id')))
            ->when(Arr::has($data, 'node_id'), fn (self $model) => $model->setNodeId(Arr::get($data, 'node_id')))
            ->when(Arr::has($data, 'firewall_group_id'), fn (self $model) => $model->setFirewallGroupId(Arr::get($data, 'firewall_group_id')))
            ->when(Arr::has($data, 'external_provider_name'), fn (self $model) => $model->setExternalProviderName(Arr::get($data, 'external_provider_name') !== null ? FirewallRuleExternalProviderNameEnum::tryFrom(Arr::get($data, 'external_provider_name')) : null))
            ->when(Arr::has($data, 'service_name'), fn (self $model) => $model->setServiceName(Arr::get($data, 'service_name') !== null ? FirewallRuleServiceNameEnum::tryFrom(Arr::get($data, 'service_name')) : null))
            ->when(Arr::has($data, 'haproxy_listen_id'), fn (self $model) => $model->setHaproxyListenId(Arr::get($data, 'haproxy_listen_id')))
            ->when(Arr::has($data, 'port'), fn (self $model) => $model->setPort(Arr::get($data, 'port')));
    }
}
