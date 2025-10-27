<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class HaproxyListensToNodesSearchRequest extends CoreApiModel implements CoreApiModelContract
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

    public function getHaproxyListenId(): int|null
    {
        return $this->getAttribute('haproxy_listen_id');
    }

    public function setHaproxyListenId(?int $haproxyListenId): self
    {
        $this->setAttribute('haproxy_listen_id', $haproxyListenId);
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

    public static function fromArray(array $data): self
    {
        return (new self(
        ))
            ->when(Arr::has($data, 'cluster_id'), fn (self $model) => $model->setClusterId(Arr::get($data, 'cluster_id')))
            ->when(Arr::has($data, 'haproxy_listen_id'), fn (self $model) => $model->setHaproxyListenId(Arr::get($data, 'haproxy_listen_id')))
            ->when(Arr::has($data, 'node_id'), fn (self $model) => $model->setNodeId(Arr::get($data, 'node_id')));
    }
}
