<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class NodeSpecificationsResource extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(
        string $hostname,
        int $memoryMib,
        int $cpuCores,
        int $diskGib,
        int $usableCpuCores,
        int $usableMemoryMib,
        int $usableDiskGib,
    ) {
        $this->setHostname($hostname);
        $this->setMemoryMib($memoryMib);
        $this->setCpuCores($cpuCores);
        $this->setDiskGib($diskGib);
        $this->setUsableCpuCores($usableCpuCores);
        $this->setUsableMemoryMib($usableMemoryMib);
        $this->setUsableDiskGib($usableDiskGib);
    }

    public function getHostname(): string
    {
        return $this->getAttribute('hostname');
    }

    public function setHostname(?string $hostname = null): self
    {
        $this->setAttribute('hostname', $hostname);
        return $this;
    }

    public function getMemoryMib(): int
    {
        return $this->getAttribute('memory_mib');
    }

    public function setMemoryMib(?int $memoryMib = null): self
    {
        $this->setAttribute('memory_mib', $memoryMib);
        return $this;
    }

    public function getCpuCores(): int
    {
        return $this->getAttribute('cpu_cores');
    }

    public function setCpuCores(?int $cpuCores = null): self
    {
        $this->setAttribute('cpu_cores', $cpuCores);
        return $this;
    }

    public function getDiskGib(): int
    {
        return $this->getAttribute('disk_gib');
    }

    public function setDiskGib(?int $diskGib = null): self
    {
        $this->setAttribute('disk_gib', $diskGib);
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

    public function getUsableMemoryMib(): int
    {
        return $this->getAttribute('usable_memory_mib');
    }

    public function setUsableMemoryMib(?int $usableMemoryMib = null): self
    {
        $this->setAttribute('usable_memory_mib', $usableMemoryMib);
        return $this;
    }

    public function getUsableDiskGib(): int
    {
        return $this->getAttribute('usable_disk_gib');
    }

    public function setUsableDiskGib(?int $usableDiskGib = null): self
    {
        $this->setAttribute('usable_disk_gib', $usableDiskGib);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            hostname: Arr::get($data, 'hostname'),
            memoryMib: Arr::get($data, 'memory_mib'),
            cpuCores: Arr::get($data, 'cpu_cores'),
            diskGib: Arr::get($data, 'disk_gib'),
            usableCpuCores: Arr::get($data, 'usable_cpu_cores'),
            usableMemoryMib: Arr::get($data, 'usable_memory_mib'),
            usableDiskGib: Arr::get($data, 'usable_disk_gib'),
        ));
    }
}
