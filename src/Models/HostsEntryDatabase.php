<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

/**
 * Properties.
 */
class HostsEntryDatabase extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(
        int $id,
        string $createdAt,
        string $updatedAt,
        int $nodeId,
        string $hostName,
        int $clusterId,
    ) {
        $this->setId($id);
        $this->setCreatedAt($createdAt);
        $this->setUpdatedAt($updatedAt);
        $this->setNodeId($nodeId);
        $this->setHostName($hostName);
        $this->setClusterId($clusterId);
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
        $this->setAttribute('created_at', $createdAt);
        return $this;
    }

    public function getUpdatedAt(): string
    {
        return $this->getAttribute('updatedAt');
    }

    public function setUpdatedAt(?string $updatedAt = null): self
    {
        $this->setAttribute('updated_at', $updatedAt);
        return $this;
    }

    public function getNodeId(): int
    {
        return $this->getAttribute('nodeId');
    }

    public function setNodeId(?int $nodeId = null): self
    {
        $this->setAttribute('node_id', $nodeId);
        return $this;
    }

    public function getHostName(): string
    {
        return $this->getAttribute('hostName');
    }

    public function setHostName(?string $hostName = null): self
    {
        $this->setAttribute('host_name', $hostName);
        return $this;
    }

    public function getClusterId(): int
    {
        return $this->getAttribute('clusterId');
    }

    public function setClusterId(?int $clusterId = null): self
    {
        $this->setAttribute('cluster_id', $clusterId);
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
        ));
    }
}
