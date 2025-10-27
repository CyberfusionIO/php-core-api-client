<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class FirewallRuleIncludes extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function __construct(
        NodeResource $node,
        ClusterResource $cluster,
        ?FirewallGroupResource $firewallGroup = null,
        ?HAProxyListenResource $haproxyListen = null,
    ) {
        $this->setNode($node);
        $this->setCluster($cluster);
        $this->setFirewallGroup($firewallGroup);
        $this->setHaproxyListen($haproxyListen);
    }

    public function getNode(): NodeResource
    {
        return $this->getAttribute('node');
    }

    public function setNode(NodeResource $node): self
    {
        $this->setAttribute('node', $node);
        return $this;
    }

    public function getFirewallGroup(): FirewallGroupResource|null
    {
        return $this->getAttribute('firewall_group');
    }

    public function setFirewallGroup(?FirewallGroupResource $firewallGroup): self
    {
        $this->setAttribute('firewall_group', $firewallGroup);
        return $this;
    }

    public function getHaproxyListen(): HAProxyListenResource|null
    {
        return $this->getAttribute('haproxy_listen');
    }

    public function setHaproxyListen(?HAProxyListenResource $haproxyListen): self
    {
        $this->setAttribute('haproxy_listen', $haproxyListen);
        return $this;
    }

    public function getCluster(): ClusterResource
    {
        return $this->getAttribute('cluster');
    }

    public function setCluster(ClusterResource $cluster): self
    {
        $this->setAttribute('cluster', $cluster);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            node: NodeResource::fromArray(Arr::get($data, 'node')),
            cluster: ClusterResource::fromArray(Arr::get($data, 'cluster')),
            firewallGroup: Arr::get($data, 'firewall_group') !== null ? FirewallGroupResource::fromArray(Arr::get($data, 'firewall_group')) : null,
            haproxyListen: Arr::get($data, 'haproxy_listen') !== null ? HAProxyListenResource::fromArray(Arr::get($data, 'haproxy_listen')) : null,
        ));
    }
}
