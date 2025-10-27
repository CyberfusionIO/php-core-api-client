<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Enums\LoadBalancingMethodEnum;
use Cyberfusion\CoreApi\Enums\NodeGroupEnum;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class HaproxyListensSearchRequest extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function getName(): string|null
    {
        return $this->getAttribute('name');
    }

    public function setName(?string $name): self
    {
        $this->setAttribute('name', $name);
        return $this;
    }

    public function getClusterId(): int|null
    {
        return $this->getAttribute('cluster_id');
    }

    public function setClusterId(?int $clusterId): self
    {
        $this->setAttribute('cluster_id', $clusterId);
        return $this;
    }

    public function getNodesGroup(): NodeGroupEnum|null
    {
        return $this->getAttribute('nodes_group');
    }

    public function setNodesGroup(?NodeGroupEnum $nodesGroup): self
    {
        $this->setAttribute('nodes_group', $nodesGroup);
        return $this;
    }

    public function getNodesIds(): int|null
    {
        return $this->getAttribute('nodes_ids');
    }

    public function setNodesIds(?int $nodesIds): self
    {
        $this->setAttribute('nodes_ids', $nodesIds);
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

    public function getSocketPath(): string|null
    {
        return $this->getAttribute('socket_path');
    }

    public function setSocketPath(?string $socketPath): self
    {
        $this->setAttribute('socket_path', $socketPath);
        return $this;
    }

    public function getLoadBalancingMethod(): LoadBalancingMethodEnum|null
    {
        return $this->getAttribute('load_balancing_method');
    }

    public function setLoadBalancingMethod(?LoadBalancingMethodEnum $loadBalancingMethod): self
    {
        $this->setAttribute('load_balancing_method', $loadBalancingMethod);
        return $this;
    }

    public function getDestinationClusterId(): int|null
    {
        return $this->getAttribute('destination_cluster_id');
    }

    public function setDestinationClusterId(?int $destinationClusterId): self
    {
        $this->setAttribute('destination_cluster_id', $destinationClusterId);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
        ))
            ->when(Arr::has($data, 'name'), fn (self $model) => $model->setName(Arr::get($data, 'name')))
            ->when(Arr::has($data, 'cluster_id'), fn (self $model) => $model->setClusterId(Arr::get($data, 'cluster_id')))
            ->when(Arr::has($data, 'nodes_group'), fn (self $model) => $model->setNodesGroup(Arr::get($data, 'nodes_group') !== null ? NodeGroupEnum::tryFrom(Arr::get($data, 'nodes_group')) : null))
            ->when(Arr::has($data, 'nodes_ids'), fn (self $model) => $model->setNodesIds(Arr::get($data, 'nodes_ids')))
            ->when(Arr::has($data, 'port'), fn (self $model) => $model->setPort(Arr::get($data, 'port')))
            ->when(Arr::has($data, 'socket_path'), fn (self $model) => $model->setSocketPath(Arr::get($data, 'socket_path')))
            ->when(Arr::has($data, 'load_balancing_method'), fn (self $model) => $model->setLoadBalancingMethod(Arr::get($data, 'load_balancing_method') !== null ? LoadBalancingMethodEnum::tryFrom(Arr::get($data, 'load_balancing_method')) : null))
            ->when(Arr::has($data, 'destination_cluster_id'), fn (self $model) => $model->setDestinationClusterId(Arr::get($data, 'destination_cluster_id')));
    }
}
