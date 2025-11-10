<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class HaproxyListenToNodeIncludes extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function __construct(
        ?HaproxyListenResource $haproxyListen = null,
        ?NodeResource $node = null,
        ?ClusterResource $cluster = null,
    ) {
        $this->setHaproxyListen($haproxyListen);
        $this->setNode($node);
        $this->setCluster($cluster);
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

    public function getNode(): NodeResource|null
    {
        return $this->getAttribute('node');
    }

    public function setNode(?NodeResource $node): self
    {
        $this->setAttribute('node', $node);
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
            haproxyListen: Arr::get($data, 'haproxy_listen') !== null ? HaproxyListenResource::fromArray(Arr::get($data, 'haproxy_listen')) : null,
            node: Arr::get($data, 'node') !== null ? NodeResource::fromArray(Arr::get($data, 'node')) : null,
            cluster: Arr::get($data, 'cluster') !== null ? ClusterResource::fromArray(Arr::get($data, 'cluster')) : null,
        ));
    }
}
