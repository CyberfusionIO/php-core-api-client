<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class DaemonsMetricsResource extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function __construct(array $cpuUsages, array $memoryUsages)
    {
        $this->setCpuUsages($cpuUsages);
        $this->setMemoryUsages($memoryUsages);
    }

    public function getCpuUsages(): array
    {
        return $this->getAttribute('cpu_usages');
    }

    public function setCpuUsages(array $cpuUsages): self
    {
        $this->setAttribute('cpu_usages', $cpuUsages);
        return $this;
    }

    public function getMemoryUsages(): array
    {
        return $this->getAttribute('memory_usages');
    }

    public function setMemoryUsages(array $memoryUsages): self
    {
        $this->setAttribute('memory_usages', $memoryUsages);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            cpuUsages: Arr::get($data, 'cpu_usages'),
            memoryUsages: Arr::get($data, 'memory_usages'),
        ));
    }
}
