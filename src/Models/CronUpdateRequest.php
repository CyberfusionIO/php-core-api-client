<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class CronUpdateRequest extends CoreApiModel implements CoreApiModelContract
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

    public function getEmailAddress(): string|null
    {
        return $this->getAttribute('email_address');
    }

    public function setEmailAddress(?string $emailAddress): self
    {
        $this->setAttribute('email_address', $emailAddress);
        return $this;
    }

    public function getSchedule(): string|null
    {
        return $this->getAttribute('schedule');
    }

    public function setSchedule(?string $schedule): self
    {
        $this->setAttribute('schedule', $schedule);
        return $this;
    }

    public function getErrorCount(): int|null
    {
        return $this->getAttribute('error_count');
    }

    public function setErrorCount(?int $errorCount): self
    {
        $this->setAttribute('error_count', $errorCount);
        return $this;
    }

    public function getRandomDelayMaxSeconds(): int|null
    {
        return $this->getAttribute('random_delay_max_seconds');
    }

    public function setRandomDelayMaxSeconds(?int $randomDelayMaxSeconds): self
    {
        $this->setAttribute('random_delay_max_seconds', $randomDelayMaxSeconds);
        return $this;
    }

    public function getTimeoutSeconds(): int|null
    {
        return $this->getAttribute('timeout_seconds');
    }

    public function setTimeoutSeconds(?int $timeoutSeconds): self
    {
        $this->setAttribute('timeout_seconds', $timeoutSeconds);
        return $this;
    }

    public function getLockingEnabled(): bool|null
    {
        return $this->getAttribute('locking_enabled');
    }

    public function setLockingEnabled(?bool $lockingEnabled): self
    {
        $this->setAttribute('locking_enabled', $lockingEnabled);
        return $this;
    }

    public function getIsActive(): bool|null
    {
        return $this->getAttribute('is_active');
    }

    public function setIsActive(?bool $isActive): self
    {
        $this->setAttribute('is_active', $isActive);
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

    public function getNodeId(): int|null
    {
        return $this->getAttribute('node_id');
    }

    public function setNodeId(?int $nodeId): self
    {
        $this->setAttribute('node_id', $nodeId);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
        ))
            ->when(Arr::has($data, 'command'), fn (self $model) => $model->setCommand(Arr::get($data, 'command')))
            ->when(Arr::has($data, 'email_address'), fn (self $model) => $model->setEmailAddress(Arr::get($data, 'email_address')))
            ->when(Arr::has($data, 'schedule'), fn (self $model) => $model->setSchedule(Arr::get($data, 'schedule')))
            ->when(Arr::has($data, 'error_count'), fn (self $model) => $model->setErrorCount(Arr::get($data, 'error_count')))
            ->when(Arr::has($data, 'random_delay_max_seconds'), fn (self $model) => $model->setRandomDelayMaxSeconds(Arr::get($data, 'random_delay_max_seconds')))
            ->when(Arr::has($data, 'timeout_seconds'), fn (self $model) => $model->setTimeoutSeconds(Arr::get($data, 'timeout_seconds')))
            ->when(Arr::has($data, 'locking_enabled'), fn (self $model) => $model->setLockingEnabled(Arr::get($data, 'locking_enabled')))
            ->when(Arr::has($data, 'is_active'), fn (self $model) => $model->setIsActive(Arr::get($data, 'is_active')))
            ->when(Arr::has($data, 'memory_limit'), fn (self $model) => $model->setMemoryLimit(Arr::get($data, 'memory_limit')))
            ->when(Arr::has($data, 'cpu_limit'), fn (self $model) => $model->setCpuLimit(Arr::get($data, 'cpu_limit')))
            ->when(Arr::has($data, 'node_id'), fn (self $model) => $model->setNodeId(Arr::get($data, 'node_id')));
    }
}
