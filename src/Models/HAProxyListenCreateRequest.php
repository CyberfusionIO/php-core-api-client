<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Enums\LoadBalancingMethodEnum;
use Cyberfusion\CoreApi\Enums\NodeGroupEnum;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class HAProxyListenCreateRequest extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(
        string $name,
        int $clusterId,
        NodeGroupEnum $nodesGroup,
        int $destinationClusterId,
        ?int $port = null,
        ?string $socketPath = null,
    ) {
        $this->setName($name);
        $this->setClusterId($clusterId);
        $this->setNodesGroup($nodesGroup);
        $this->setDestinationClusterId($destinationClusterId);
        $this->setPort($port);
        $this->setSocketPath($socketPath);
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
        return $this->getAttribute('cluster_id');
    }

    public function setClusterId(?int $clusterId = null): self
    {
        $this->setAttribute('cluster_id', $clusterId);
        return $this;
    }

    public function getNodesGroup(): NodeGroupEnum
    {
        return $this->getAttribute('nodes_group');
    }

    public function setNodesGroup(?NodeGroupEnum $nodesGroup = null): self
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

    public function setPort(?int $port = null): self
    {
        $this->setAttribute('port', $port);
        return $this;
    }

    public function getSocketPath(): string|null
    {
        return $this->getAttribute('socket_path');
    }

    public function setSocketPath(?string $socketPath = null): self
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

    public function setDestinationClusterId(?int $destinationClusterId = null): self
    {
        $this->setAttribute('destination_cluster_id', $destinationClusterId);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            name: Arr::get($data, 'name'),
            clusterId: Arr::get($data, 'cluster_id'),
            nodesGroup: NodeGroupEnum::tryFrom(Arr::get($data, 'nodes_group')),
            destinationClusterId: Arr::get($data, 'destination_cluster_id'),
            port: Arr::get($data, 'port'),
            socketPath: Arr::get($data, 'socket_path'),
        ))
            ->setNodesIds(Arr::get($data, 'nodes_ids'))
            ->setLoadBalancingMethod(LoadBalancingMethodEnum::tryFrom(Arr::get($data, 'load_balancing_method', 'Source IP Address')));
    }
}
