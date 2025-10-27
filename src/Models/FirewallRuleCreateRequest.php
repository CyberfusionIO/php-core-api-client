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

class FirewallRuleCreateRequest extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function __construct(
        int $nodeId,
        ?int $firewallGroupId = null,
        ?FirewallRuleExternalProviderNameEnum $externalProviderName = null,
        ?FirewallRuleServiceNameEnum $serviceName = null,
        ?int $haproxyListenId = null,
        ?int $port = null,
    ) {
        $this->setNodeId($nodeId);
        $this->setFirewallGroupId($firewallGroupId);
        $this->setExternalProviderName($externalProviderName);
        $this->setServiceName($serviceName);
        $this->setHaproxyListenId($haproxyListenId);
        $this->setPort($port);
    }

    public function getNodeId(): int
    {
        return $this->getAttribute('node_id');
    }

    public function setNodeId(int $nodeId): self
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
            nodeId: Arr::get($data, 'node_id'),
            firewallGroupId: Arr::get($data, 'firewall_group_id'),
            externalProviderName: Arr::get($data, 'external_provider_name') !== null ? FirewallRuleExternalProviderNameEnum::tryFrom(Arr::get($data, 'external_provider_name')) : null,
            serviceName: Arr::get($data, 'service_name') !== null ? FirewallRuleServiceNameEnum::tryFrom(Arr::get($data, 'service_name')) : null,
            haproxyListenId: Arr::get($data, 'haproxy_listen_id'),
            port: Arr::get($data, 'port'),
        ));
    }
}
