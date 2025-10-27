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

class HAProxyListenResource extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function __construct(
        int $id,
        string $createdAt,
        string $updatedAt,
        string $name,
        int $clusterId,
        NodeGroupEnum $nodesGroup,
        int $destinationClusterId,
        HAProxyListenIncludes $includes,
        ?array $nodesIds = null,
        ?int $port = null,
        ?string $socketPath = null,
    ) {
        $this->setId($id);
        $this->setCreatedAt($createdAt);
        $this->setUpdatedAt($updatedAt);
        $this->setName($name);
        $this->setClusterId($clusterId);
        $this->setNodesGroup($nodesGroup);
        $this->setDestinationClusterId($destinationClusterId);
        $this->setIncludes($includes);
        $this->setNodesIds($nodesIds);
        $this->setPort($port);
        $this->setSocketPath($socketPath);
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

    public function getName(): string
    {
        return $this->getAttribute('name');
    }

    /**
     * @throws ValidationException
     */
    public function setName(string $name): self
    {
        Validator::create()
            ->length(min: 1, max: 64)
            ->regex('/^[a-z_]+$/')
            ->assert($name);
        $this->setAttribute('name', $name);
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

    public function getNodesGroup(): NodeGroupEnum
    {
        return $this->getAttribute('nodes_group');
    }

    public function setNodesGroup(NodeGroupEnum $nodesGroup): self
    {
        $this->setAttribute('nodes_group', $nodesGroup);
        return $this;
    }

    public function getNodesIds(): array|null
    {
        return $this->getAttribute('nodes_ids');
    }

    public function setNodesIds(?array $nodesIds): self
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

    public function getLoadBalancingMethod(): LoadBalancingMethodEnum
    {
        return $this->getAttribute('load_balancing_method');
    }

    public function setLoadBalancingMethod(LoadBalancingMethodEnum $loadBalancingMethod): self
    {
        $this->setAttribute('load_balancing_method', $loadBalancingMethod);
        return $this;
    }

    public function getDestinationClusterId(): int
    {
        return $this->getAttribute('destination_cluster_id');
    }

    public function setDestinationClusterId(int $destinationClusterId): self
    {
        $this->setAttribute('destination_cluster_id', $destinationClusterId);
        return $this;
    }

    public function getIncludes(): HAProxyListenIncludes
    {
        return $this->getAttribute('includes');
    }

    public function setIncludes(HAProxyListenIncludes $includes): self
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
            name: Arr::get($data, 'name'),
            clusterId: Arr::get($data, 'cluster_id'),
            nodesGroup: NodeGroupEnum::tryFrom(Arr::get($data, 'nodes_group')),
            destinationClusterId: Arr::get($data, 'destination_cluster_id'),
            includes: HAProxyListenIncludes::fromArray(Arr::get($data, 'includes')),
            nodesIds: Arr::get($data, 'nodes_ids'),
            port: Arr::get($data, 'port'),
            socketPath: Arr::get($data, 'socket_path'),
        ))
            ->when(Arr::has($data, 'load_balancing_method'), fn (self $model) => $model->setLoadBalancingMethod(LoadBalancingMethodEnum::tryFrom(Arr::get($data, 'load_balancing_method', 'Source IP Address'))));
    }
}
