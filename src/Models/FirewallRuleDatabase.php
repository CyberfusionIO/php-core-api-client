<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Enums\FirewallRuleExternalProviderNameEnum;
use Cyberfusion\CoreApi\Enums\FirewallRuleServiceNameEnum;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

/**
 * Properties.
 */
class FirewallRuleDatabase extends CoreApiModel implements CoreApiModelContract
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
        return $this->getAttribute('createdAt');
    }

    public function setCreatedAt(?string $createdAt = null): self
    {
        $this->setAttribute('createdAt', $createdAt);
        return $this;
    }

    public function getUpdatedAt(): string
    {
        return $this->getAttribute('updatedAt');
    }

    public function setUpdatedAt(?string $updatedAt = null): self
    {
        $this->setAttribute('updatedAt', $updatedAt);
        return $this;
    }

    public function getClusterId(): int
    {
        return $this->getAttribute('clusterId');
    }

    public function setClusterId(?int $clusterId = null): self
    {
        $this->setAttribute('clusterId', $clusterId);
        return $this;
    }

    public function getNodeId(): int
    {
        return $this->getAttribute('nodeId');
    }

    public function setNodeId(?int $nodeId = null): self
    {
        $this->setAttribute('nodeId', $nodeId);
        return $this;
    }

    public function getFirewallGroupId(): int|null
    {
        return $this->getAttribute('firewallGroupId');
    }

    public function setFirewallGroupId(?int $firewallGroupId = null): self
    {
        $this->setAttribute('firewallGroupId', $firewallGroupId);
        return $this;
    }

    public function getExternalProviderName(): FirewallRuleExternalProviderNameEnum|null
    {
        return $this->getAttribute('externalProviderName');
    }

    public function setExternalProviderName(?FirewallRuleExternalProviderNameEnum $externalProviderName = null): self
    {
        $this->setAttribute('externalProviderName', $externalProviderName);
        return $this;
    }

    public function getServiceName(): FirewallRuleServiceNameEnum|null
    {
        return $this->getAttribute('serviceName');
    }

    public function setServiceName(?FirewallRuleServiceNameEnum $serviceName = null): self
    {
        $this->setAttribute('serviceName', $serviceName);
        return $this;
    }

    public function getHaproxyListenId(): int|null
    {
        return $this->getAttribute('haproxyListenId');
    }

    public function setHaproxyListenId(?int $haproxyListenId = null): self
    {
        $this->setAttribute('haproxyListenId', $haproxyListenId);
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
        ));
    }
}
