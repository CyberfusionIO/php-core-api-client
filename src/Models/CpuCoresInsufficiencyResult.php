<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class CpuCoresInsufficiencyResult extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(int $nodeId, int $totalCpuCores, int $usableCpuCores, int $wantedCpuCores)
    {
        $this->setNodeId($nodeId);
        $this->setTotalCpuCores($totalCpuCores);
        $this->setUsableCpuCores($usableCpuCores);
        $this->setWantedCpuCores($wantedCpuCores);
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

    public function getType(): string
    {
        return $this->getAttribute('type');
    }

    public function setType(string $type): self
    {
        $this->setAttribute('type', $type);
        return $this;
    }

    public function getTotalCpuCores(): int
    {
        return $this->getAttribute('total_cpu_cores');
    }

    public function setTotalCpuCores(?int $totalCpuCores = null): self
    {
        $this->setAttribute('total_cpu_cores', $totalCpuCores);
        return $this;
    }

    public function getUsableCpuCores(): int
    {
        return $this->getAttribute('usable_cpu_cores');
    }

    public function setUsableCpuCores(?int $usableCpuCores = null): self
    {
        $this->setAttribute('usable_cpu_cores', $usableCpuCores);
        return $this;
    }

    public function getWantedCpuCores(): int
    {
        return $this->getAttribute('wanted_cpu_cores');
    }

    public function setWantedCpuCores(?int $wantedCpuCores = null): self
    {
        $this->setAttribute('wanted_cpu_cores', $wantedCpuCores);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            nodeId: Arr::get($data, 'node_id'),
            totalCpuCores: Arr::get($data, 'total_cpu_cores'),
            usableCpuCores: Arr::get($data, 'usable_cpu_cores'),
            wantedCpuCores: Arr::get($data, 'wanted_cpu_cores'),
        ))
            ->setType(Arr::get($data, 'type', 'cpu_cores'));
    }
}
