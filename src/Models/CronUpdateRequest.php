<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class CronUpdateRequest extends CoreApiModel implements CoreApiModelContract
{
    public function __construct()
    {
    }

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
            ->setCommand(Arr::get($data, 'command'))
            ->setEmailAddress(Arr::get($data, 'email_address'))
            ->setSchedule(Arr::get($data, 'schedule'))
            ->setErrorCount(Arr::get($data, 'error_count'))
            ->setRandomDelayMaxSeconds(Arr::get($data, 'random_delay_max_seconds'))
            ->setTimeoutSeconds(Arr::get($data, 'timeout_seconds'))
            ->setLockingEnabled(Arr::get($data, 'locking_enabled'))
            ->setIsActive(Arr::get($data, 'is_active'))
            ->setMemoryLimit(Arr::get($data, 'memory_limit'))
            ->setCpuLimit(Arr::get($data, 'cpu_limit'))
            ->setNodeId(Arr::get($data, 'node_id'));
    }
}
