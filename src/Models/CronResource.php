<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class CronResource extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function __construct(
        int $id,
        string $createdAt,
        string $updatedAt,
        int $clusterId,
        int $nodeId,
        string $name,
        int $unixUserId,
        string $command,
        string $schedule,
        int $errorCount,
        int $randomDelayMaxSeconds,
        bool $lockingEnabled,
        bool $isActive,
        CronIncludes $includes,
        ?string $emailAddress = null,
        ?int $timeoutSeconds = null,
        ?int $memoryLimit = null,
        ?int $cpuLimit = null,
    ) {
        $this->setId($id);
        $this->setCreatedAt($createdAt);
        $this->setUpdatedAt($updatedAt);
        $this->setClusterId($clusterId);
        $this->setNodeId($nodeId);
        $this->setName($name);
        $this->setUnixUserId($unixUserId);
        $this->setCommand($command);
        $this->setSchedule($schedule);
        $this->setErrorCount($errorCount);
        $this->setRandomDelayMaxSeconds($randomDelayMaxSeconds);
        $this->setLockingEnabled($lockingEnabled);
        $this->setIsActive($isActive);
        $this->setIncludes($includes);
        $this->setEmailAddress($emailAddress);
        $this->setTimeoutSeconds($timeoutSeconds);
        $this->setMemoryLimit($memoryLimit);
        $this->setCpuLimit($cpuLimit);
    }

    public function getId(): int
    {
        return $this->getAttribute('id');
    }

    public function setId(int $id): self
    {
        $this->setAttribute('id', $id);
        return $this;
    }

    public function getCreatedAt(): string
    {
        return $this->getAttribute('created_at');
    }

    public function setCreatedAt(string $createdAt): self
    {
        $this->setAttribute('created_at', $createdAt);
        return $this;
    }

    public function getUpdatedAt(): string
    {
        return $this->getAttribute('updated_at');
    }

    public function setUpdatedAt(string $updatedAt): self
    {
        $this->setAttribute('updated_at', $updatedAt);
        return $this;
    }

    public function getClusterId(): int
    {
        return $this->getAttribute('cluster_id');
    }

    public function setClusterId(int $clusterId): self
    {
        $this->setAttribute('cluster_id', $clusterId);
        return $this;
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
            ->regex('/^[a-zA-Z0-9-\._\$\/\ ]+$/')
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

    public function getIncludes(): CronIncludes
    {
        return $this->getAttribute('includes');
    }

    public function setIncludes(CronIncludes $includes): self
    {
        $this->setAttribute('includes', $includes);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            id: Arr::get($data, 'id'),
            createdAt: Arr::get($data, 'created_at'),
            updatedAt: Arr::get($data, 'updated_at'),
            clusterId: Arr::get($data, 'cluster_id'),
            nodeId: Arr::get($data, 'node_id'),
            name: Arr::get($data, 'name'),
            unixUserId: Arr::get($data, 'unix_user_id'),
            command: Arr::get($data, 'command'),
            schedule: Arr::get($data, 'schedule'),
            errorCount: Arr::get($data, 'error_count'),
            randomDelayMaxSeconds: Arr::get($data, 'random_delay_max_seconds'),
            lockingEnabled: Arr::get($data, 'locking_enabled'),
            isActive: Arr::get($data, 'is_active'),
            includes: CronIncludes::fromArray(Arr::get($data, 'includes')),
            emailAddress: Arr::get($data, 'email_address'),
            timeoutSeconds: Arr::get($data, 'timeout_seconds'),
            memoryLimit: Arr::get($data, 'memory_limit'),
            cpuLimit: Arr::get($data, 'cpu_limit'),
        ));
    }
}
