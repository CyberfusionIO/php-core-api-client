<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class DaemonUpdateRequest extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function getCommand(): string|null
    {
        return $this->getAttribute('command');
    }

    public function setCommand(?string $command): self
    {
        $this->setAttribute('command', $command);
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

    public function getMemoryLimit(): int|null
    {
        return $this->getAttribute('memory_limit');
    }

    public function setMemoryLimit(?int $memoryLimit): self
    {
        $this->setAttribute('memory_limit', $memoryLimit);
        return $this;
    }

    public function getCpuLimit(): int|null
    {
        return $this->getAttribute('cpu_limit');
    }

    public function setCpuLimit(?int $cpuLimit): self
    {
        $this->setAttribute('cpu_limit', $cpuLimit);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
        ))
            ->when(Arr::has($data, 'command'), fn (self $model) => $model->setCommand(Arr::get($data, 'command')))
            ->when(Arr::has($data, 'nodes_ids'), fn (self $model) => $model->setNodesIds(Arr::get($data, 'nodes_ids')))
            ->when(Arr::has($data, 'memory_limit'), fn (self $model) => $model->setMemoryLimit(Arr::get($data, 'memory_limit')))
            ->when(Arr::has($data, 'cpu_limit'), fn (self $model) => $model->setCpuLimit(Arr::get($data, 'cpu_limit')));
    }
}
