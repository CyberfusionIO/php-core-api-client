<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Enums\LoadBalancingMethodEnum;
use Cyberfusion\CoreApi\Enums\NodeGroupEnum;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class HAProxyListenResource extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(
        int $id,
        string $createdAt,
        string $updatedAt,
        string $name,
        int $clusterId,
        NodeGroupEnum $nodesGroup,
        int $destinationClusterId,
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
        $this->setNodesIds($nodesIds);
        $this->setPort($port);
        $this->setSocketPath($socketPath);
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

    public function getName(): string
    {
        return $this->getAttribute('name');
    }

    /**
     * @throws ValidationException
     */
    public function setName(?string $name = null): self
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
        return $this->getAttribute('clusterId');
    }

    public function setClusterId(?int $clusterId = null): self
    {
        $this->setAttribute('clusterId', $clusterId);
        return $this;
    }

    public function getNodesGroup(): NodeGroupEnum
    {
        return $this->getAttribute('nodesGroup');
    }

    public function setNodesGroup(?NodeGroupEnum $nodesGroup = null): self
    {
        $this->setAttribute('nodesGroup', $nodesGroup);
        return $this;
    }

    public function getNodesIds(): array|null
    {
        return $this->getAttribute('nodesIds');
    }

    public function setNodesIds(?array $nodesIds = []): self
    {
        $this->setAttribute('nodesIds', $nodesIds);
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

    public function getSocketPath(): string|null
    {
        return $this->getAttribute('socketPath');
    }

    public function setSocketPath(?string $socketPath = null): self
    {
        $this->setAttribute('socketPath', $socketPath);
        return $this;
    }

    public function getLoadBalancingMethod(): LoadBalancingMethodEnum
    {
        return $this->getAttribute('loadBalancingMethod');
    }

    public function setLoadBalancingMethod(LoadBalancingMethodEnum $loadBalancingMethod): self
    {
        $this->setAttribute('loadBalancingMethod', $loadBalancingMethod);
        return $this;
    }

    public function getDestinationClusterId(): int
    {
        return $this->getAttribute('destinationClusterId');
    }

    public function setDestinationClusterId(?int $destinationClusterId = null): self
    {
        $this->setAttribute('destinationClusterId', $destinationClusterId);
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
            nodesIds: Arr::get($data, 'nodes_ids'),
            port: Arr::get($data, 'port'),
            socketPath: Arr::get($data, 'socket_path'),
        ))
            ->setLoadBalancingMethod(Arr::get($data, 'load_balancing_method'));
    }
}
