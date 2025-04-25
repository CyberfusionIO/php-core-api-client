<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Enums\FirewallRuleExternalProviderNameEnum;
use Cyberfusion\CoreApi\Enums\FirewallRuleServiceNameEnum;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class FirewallRuleResource extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(
        int $id,
        string $createdAt,
        string $updatedAt,
        int $clusterId,
        int $nodeId,
        ?int $firewallGroupId = null,
        ?FirewallRuleExternalProviderNameEnum $externalProviderName = null,
        ?FirewallRuleServiceNameEnum $serviceName = null,
        ?int $haproxyListenId = null,
        ?int $port = null,
    ) {
        $this->setId($id);
        $this->setCreatedAt($createdAt);
        $this->setUpdatedAt($updatedAt);
        $this->setClusterId($clusterId);
        $this->setNodeId($nodeId);
        $this->setFirewallGroupId($firewallGroupId);
        $this->setExternalProviderName($externalProviderName);
        $this->setServiceName($serviceName);
        $this->setHaproxyListenId($haproxyListenId);
        $this->setPort($port);
    }

    public function getId(): int
    {
        return $this->getAttribute('id');
    }

    public function setId(?int $id = null): self
    {
        $this->setAttribute('id', $id);
        return $this;
    }

    public function getCreatedAt(): string
    {
        return $this->getAttribute('created_at');
    }

    public function setCreatedAt(?string $createdAt = null): self
    {
        $this->setAttribute('created_at', $createdAt);
        return $this;
    }

    public function getUpdatedAt(): string
    {
        return $this->getAttribute('updated_at');
    }

    public function setUpdatedAt(?string $updatedAt = null): self
    {
        $this->setAttribute('updated_at', $updatedAt);
        return $this;
    }

    public function getClusterId(): int
    {
        return $this->getAttribute('cluster_id');
    }

    public function setClusterId(?int $clusterId = null): self
    {
        $this->setAttribute('cluster_id', $clusterId);
        return $this;
    }

    public function getNodeId(): int
    {
        return $this->getAttribute('node_id');
    }

    public function setNodeId(?int $nodeId = null): self
    {
        $this->setAttribute('node_id', $nodeId);
        return $this;
    }

    public function getFirewallGroupId(): int|null
    {
        return $this->getAttribute('firewall_group_id');
    }

    public function setFirewallGroupId(?int $firewallGroupId = null): self
    {
        $this->setAttribute('firewall_group_id', $firewallGroupId);
        return $this;
    }

    public function getExternalProviderName(): FirewallRuleExternalProviderNameEnum|null
    {
        return $this->getAttribute('external_provider_name');
    }

    public function setExternalProviderName(?FirewallRuleExternalProviderNameEnum $externalProviderName = null): self
    {
        $this->setAttribute('external_provider_name', $externalProviderName);
        return $this;
    }

    public function getServiceName(): FirewallRuleServiceNameEnum|null
    {
        return $this->getAttribute('service_name');
    }

    public function setServiceName(?FirewallRuleServiceNameEnum $serviceName = null): self
    {
        $this->setAttribute('service_name', $serviceName);
        return $this;
    }

    public function getHaproxyListenId(): int|null
    {
        return $this->getAttribute('haproxy_listen_id');
    }

    public function setHaproxyListenId(?int $haproxyListenId = null): self
    {
        $this->setAttribute('haproxy_listen_id', $haproxyListenId);
        return $this;
    }

    public function getPort(): int|null
    {
        return $this->getAttribute('port');
    }

    public function setPort(?int $port = null): self
    {
        $this->setAttribute('port', $port);
        return $this;
    }

    public function getIncludes(): FirewallRuleIncludes|null
    {
        return $this->getAttribute('includes');
    }

    public function setIncludes(?FirewallRuleIncludes $includes): self
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
            clusterId: Arr::get($data, 'cluster_id'),
            nodeId: Arr::get($data, 'node_id'),
            firewallGroupId: Arr::get($data, 'firewall_group_id'),
            externalProviderName: Arr::get($data, 'external_provider_name') !== null ? FirewallRuleExternalProviderNameEnum::tryFrom(Arr::get($data, 'external_provider_name')) : null,
            serviceName: Arr::get($data, 'service_name') !== null ? FirewallRuleServiceNameEnum::tryFrom(Arr::get($data, 'service_name')) : null,
            haproxyListenId: Arr::get($data, 'haproxy_listen_id'),
            port: Arr::get($data, 'port'),
        ))
            ->setIncludes(Arr::get($data, 'includes') !== null ? FirewallRuleIncludes::fromArray(Arr::get($data, 'includes')) : null);
    }
}
