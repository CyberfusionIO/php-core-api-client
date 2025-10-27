<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class MemoryInsufficiencyResult extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function __construct(int $nodeId, int $totalMemoryMib, int $usableMemoryMib, int $wantedMemoryMib)
    {
        $this->setNodeId($nodeId);
        $this->setTotalMemoryMib($totalMemoryMib);
        $this->setUsableMemoryMib($usableMemoryMib);
        $this->setWantedMemoryMib($wantedMemoryMib);
    }

    public function getNodeId(): int
    {
        return $this->getAttribute('node_id');
    }

    public function setNodeId(int $nodeId): self
    {
        $this->setAttribute('node_id', $nodeId);
        return $this;
    }

    public function getType(): string
    {
        return $this->getAttribute('type');
    }

    public function setType(string $type): self
    {
        $this->setAttribute('type', $type);
        return $this;
    }

    public function getTotalMemoryMib(): int
    {
        return $this->getAttribute('total_memory_mib');
    }

    public function setTotalMemoryMib(int $totalMemoryMib): self
    {
        $this->setAttribute('total_memory_mib', $totalMemoryMib);
        return $this;
    }

    public function getUsableMemoryMib(): int
    {
        return $this->getAttribute('usable_memory_mib');
    }

    public function setUsableMemoryMib(int $usableMemoryMib): self
    {
        $this->setAttribute('usable_memory_mib', $usableMemoryMib);
        return $this;
    }

    public function getWantedMemoryMib(): int
    {
        return $this->getAttribute('wanted_memory_mib');
    }

    public function setWantedMemoryMib(int $wantedMemoryMib): self
    {
        $this->setAttribute('wanted_memory_mib', $wantedMemoryMib);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            nodeId: Arr::get($data, 'node_id'),
            totalMemoryMib: Arr::get($data, 'total_memory_mib'),
            usableMemoryMib: Arr::get($data, 'usable_memory_mib'),
            wantedMemoryMib: Arr::get($data, 'wanted_memory_mib'),
        ))
            ->when(Arr::has($data, 'type'), fn (self $model) => $model->setType(Arr::get($data, 'type', 'memory')));
    }
}
