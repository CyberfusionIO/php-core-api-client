<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class CronCreateRequest extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function __construct(
        string $name,
        int $unixUserId,
        string $command,
        string $schedule,
        ?int $nodeId = null,
        ?string $emailAddress = null,
    ) {
        $this->setName($name);
        $this->setUnixUserId($unixUserId);
        $this->setCommand($command);
        $this->setSchedule($schedule);
        $this->setNodeId($nodeId);
        $this->setEmailAddress($emailAddress);
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

    public function getName(): string
    {
        return $this->getAttribute('name');
    }

    /**
     * @throws ValidationException
     */
    public function setName(string $name): self
    {
        Validator::create()
            ->length(min: 1, max: 64)
            ->regex('/^[a-z0-9-_]+$/')
            ->assert($name);
        $this->setAttribute('name', $name);
        return $this;
    }

    public function getUnixUserId(): int
    {
        return $this->getAttribute('unix_user_id');
    }

    public function setUnixUserId(int $unixUserId): self
    {
        $this->setAttribute('unix_user_id', $unixUserId);
        return $this;
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
        Validator::create()
            ->length(min: 1, max: 65535)
            ->regex('/^[ -~]+$/')
            ->assert($command);
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

    public function getSchedule(): string
    {
        return $this->getAttribute('schedule');
    }

    public function setSchedule(string $schedule): self
    {
        $this->setAttribute('schedule', $schedule);
        return $this;
    }

    public function getErrorCount(): int
    {
        return $this->getAttribute('error_count');
    }

    public function setErrorCount(int $errorCount): self
    {
        $this->setAttribute('error_count', $errorCount);
        return $this;
    }

    public function getRandomDelayMaxSeconds(): int
    {
        return $this->getAttribute('random_delay_max_seconds');
    }

    public function setRandomDelayMaxSeconds(int $randomDelayMaxSeconds): self
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

    public function getLockingEnabled(): bool
    {
        return $this->getAttribute('locking_enabled');
    }

    public function setLockingEnabled(bool $lockingEnabled): self
    {
        $this->setAttribute('locking_enabled', $lockingEnabled);
        return $this;
    }

    public function getIsActive(): bool
    {
        return $this->getAttribute('is_active');
    }

    public function setIsActive(bool $isActive): self
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

    public static function fromArray(array $data): self
    {
        return (new self(
            name: Arr::get($data, 'name'),
            unixUserId: Arr::get($data, 'unix_user_id'),
            command: Arr::get($data, 'command'),
            schedule: Arr::get($data, 'schedule'),
            nodeId: Arr::get($data, 'node_id'),
            emailAddress: Arr::get($data, 'email_address'),
        ))
            ->when(Arr::has($data, 'error_count'), fn (self $model) => $model->setErrorCount(Arr::get($data, 'error_count', 1)))
            ->when(Arr::has($data, 'random_delay_max_seconds'), fn (self $model) => $model->setRandomDelayMaxSeconds(Arr::get($data, 'random_delay_max_seconds', 10)))
            ->when(Arr::has($data, 'timeout_seconds'), fn (self $model) => $model->setTimeoutSeconds(Arr::get($data, 'timeout_seconds', 600)))
            ->when(Arr::has($data, 'locking_enabled'), fn (self $model) => $model->setLockingEnabled(Arr::get($data, 'locking_enabled', true)))
            ->when(Arr::has($data, 'is_active'), fn (self $model) => $model->setIsActive(Arr::get($data, 'is_active', true)))
            ->when(Arr::has($data, 'memory_limit'), fn (self $model) => $model->setMemoryLimit(Arr::get($data, 'memory_limit')))
            ->when(Arr::has($data, 'cpu_limit'), fn (self $model) => $model->setCpuLimit(Arr::get($data, 'cpu_limit')));
    }
}
