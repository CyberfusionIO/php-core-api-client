<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class HostsEntryCreateRequest extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(int $nodeId, string $hostName, int $clusterId)
    {
        $this->setNodeId($nodeId);
        $this->setHostName($hostName);
        $this->setClusterId($clusterId);
    }

    public function getNodeId(): int
    {
        return $this->getAttribute('nodeId');
    }

    public function setNodeId(?int $nodeId = null): self
    {
        $this->setAttribute('nodeId', $nodeId);
        return $this;
    }

    public function getHostName(): string
    {
        return $this->getAttribute('hostName');
    }

    public function setHostName(?string $hostName = null): self
    {
        $this->setAttribute('hostName', $hostName);
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

    public static function fromArray(array $data): self
    {
        return (new self(
            nodeId: Arr::get($data, 'node_id'),
            hostName: Arr::get($data, 'host_name'),
            clusterId: Arr::get($data, 'cluster_id'),
        ));
    }
}
