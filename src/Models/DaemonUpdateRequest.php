<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Cyberfusion\CoreApi\Support\ValidationHelper;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class DaemonUpdateRequest extends CoreApiModel implements CoreApiModelContract
{
    public function __construct()
    {
    }

    public function getCommand(): string
    {
        return $this->getAttribute('command');
    }

    /**
     * @throws ValidationException
     */
    public function setCommand(string $command): self
    {
        Validator::optional(Validator::create()
            ->length(min: 1, max: 65535)
            ->regex('/^[ -~]+$/'))
            ->assert($command);
        $this->setAttribute('command', $command);
        return $this;
    }

    public function getNodesIds(): array
    {
        return $this->getAttribute('nodesIds');
    }

    /**
     * @throws ValidationException
     */
    public function setNodesIds(array $nodesIds): self
    {
        Validator::optional(Validator::create()
            ->unique())
            ->assert(ValidationHelper::prepareArray($nodesIds));
        $this->setAttribute('nodes_ids', $nodesIds);
        return $this;
    }

    public function getMemoryLimit(): int|null
    {
        return $this->getAttribute('memoryLimit');
    }

    public function setMemoryLimit(?int $memoryLimit): self
    {
        $this->setAttribute('memory_limit', $memoryLimit);
        return $this;
    }

    public function getCpuLimit(): int|null
    {
        return $this->getAttribute('cpuLimit');
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
            ->setCommand(Arr::get($data, 'command'))
            ->setNodesIds(Arr::get($data, 'nodes_ids'))
            ->setMemoryLimit(Arr::get($data, 'memory_limit'))
            ->setCpuLimit(Arr::get($data, 'cpu_limit'));
    }
}
