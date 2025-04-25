<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class HostsEntryDatabase extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(
        int $id,
        string $createdAt,
        string $updatedAt,
        int $nodeId,
        string $hostName,
        int $clusterId,
        NodeDatabase $node,
        ClusterDatabase $cluster,
    ) {
        $this->setId($id);
        $this->setCreatedAt($createdAt);
        $this->setUpdatedAt($updatedAt);
        $this->setNodeId($nodeId);
        $this->setHostName($hostName);
        $this->setClusterId($clusterId);
        $this->setNode($node);
        $this->setCluster($cluster);
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

    public function getNodeId(): int
    {
        return $this->getAttribute('node_id');
    }

    public function setNodeId(?int $nodeId = null): self
    {
        $this->setAttribute('node_id', $nodeId);
        return $this;
    }

    public function getHostName(): string
    {
        return $this->getAttribute('host_name');
    }

    public function setHostName(?string $hostName = null): self
    {
        $this->setAttribute('host_name', $hostName);
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

    public function getNode(): NodeDatabase
    {
        return $this->getAttribute('node');
    }

    public function setNode(?NodeDatabase $node = null): self
    {
        $this->setAttribute('node', $node);
        return $this;
    }

    public function getCluster(): ClusterDatabase
    {
        return $this->getAttribute('cluster');
    }

    public function setCluster(?ClusterDatabase $cluster = null): self
    {
        $this->setAttribute('cluster', $cluster);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            id: Arr::get($data, 'id'),
            createdAt: Arr::get($data, 'created_at'),
            updatedAt: Arr::get($data, 'updated_at'),
            nodeId: Arr::get($data, 'node_id'),
            hostName: Arr::get($data, 'host_name'),
            clusterId: Arr::get($data, 'cluster_id'),
            node: NodeDatabase::fromArray(Arr::get($data, 'node')),
            cluster: ClusterDatabase::fromArray(Arr::get($data, 'cluster')),
        ));
    }
}
