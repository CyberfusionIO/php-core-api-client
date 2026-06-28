<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class DatabaseUsersMetricsResource extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function __construct(array $totalConnections, array $cpuUsages)
    {
        $this->setTotalConnections($totalConnections);
        $this->setCpuUsages($cpuUsages);
    }

    public function getTotalConnections(): array
    {
        return $this->getAttribute('total_connections');
    }

    public function setTotalConnections(array $totalConnections): self
    {
        $this->setAttribute('total_connections', $totalConnections);
        return $this;
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

    public static function fromArray(array $data): self
    {
        return (new self(
            totalConnections: Arr::get($data, 'total_connections'),
            cpuUsages: Arr::get($data, 'cpu_usages'),
        ));
    }
}
