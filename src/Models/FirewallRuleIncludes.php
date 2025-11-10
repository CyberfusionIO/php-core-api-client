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
        ?NodeResource $node = null,
        ?FirewallGroupResource $firewallGroup = null,
        ?HaproxyListenResource $haproxyListen = null,
        ?ClusterResource $cluster = null,
    ) {
        $this->setNode($node);
        $this->setFirewallGroup($firewallGroup);
        $this->setHaproxyListen($haproxyListen);
        $this->setCluster($cluster);
    }

    public function getNode(): NodeResource|null
    {
        return $this->getAttribute('node');
    }

    public function setNode(?NodeResource $node): self
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

    public function getHaproxyListen(): HaproxyListenResource|null
    {
        return $this->getAttribute('haproxy_listen');
    }

    public function setHaproxyListen(?HaproxyListenResource $haproxyListen): self
    {
        $this->setAttribute('haproxy_listen', $haproxyListen);
        return $this;
    }

    public function getCluster(): ClusterResource|null
    {
        return $this->getAttribute('cluster');
    }

    public function setCluster(?ClusterResource $cluster): self
    {
        $this->setAttribute('cluster', $cluster);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            node: Arr::get($data, 'node') !== null ? NodeResource::fromArray(Arr::get($data, 'node')) : null,
            firewallGroup: Arr::get($data, 'firewall_group') !== null ? FirewallGroupResource::fromArray(Arr::get($data, 'firewall_group')) : null,
            haproxyListen: Arr::get($data, 'haproxy_listen') !== null ? HaproxyListenResource::fromArray(Arr::get($data, 'haproxy_listen')) : null,
            cluster: Arr::get($data, 'cluster') !== null ? ClusterResource::fromArray(Arr::get($data, 'cluster')) : null,
        ));
    }
}
