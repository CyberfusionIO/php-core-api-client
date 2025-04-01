<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class CronResource extends CoreApiModel implements CoreApiModelContract
{
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
        ?string $emailAddress = null,
        ?int $timeoutSeconds = null,
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
        $this->setEmailAddress($emailAddress);
        $this->setTimeoutSeconds($timeoutSeconds);
    }

    public function getId(): int
    {
        return $this->getAttribute('id');
    }

    public function setId(?int $id = null): self
    {
        $this->setAttribute('id', $id);
        return $this;
    }

    public function getCreatedAt(): string
    {
        return $this->getAttribute('createdAt');
    }

    public function setCreatedAt(?string $createdAt = null): self
    {
        $this->setAttribute('createdAt', $createdAt);
        return $this;
    }

    public function getUpdatedAt(): string
    {
        return $this->getAttribute('updatedAt');
    }

    public function setUpdatedAt(?string $updatedAt = null): self
    {
        $this->setAttribute('updatedAt', $updatedAt);
        return $this;
    }

    public function getClusterId(): int
    {
        return $this->getAttribute('clusterId');
    }

    public function setClusterId(?int $clusterId = null): self
    {
        $this->setAttribute('clusterId', $clusterId);
        return $this;
    }

    public function getNodeId(): int
    {
        return $this->getAttribute('nodeId');
    }

    public function setNodeId(?int $nodeId = null): self
    {
        $this->setAttribute('nodeId', $nodeId);
        return $this;
    }

    public function getName(): string
    {
        return $this->getAttribute('name');
    }

    /**
     * @throws ValidationException
     */
    public function setName(?string $name = null): self
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
        return $this->getAttribute('unixUserId');
    }

    public function setUnixUserId(?int $unixUserId = null): self
    {
        $this->setAttribute('unixUserId', $unixUserId);
        return $this;
    }

    public function getCommand(): string
    {
        return $this->getAttribute('command');
    }

    /**
     * @throws ValidationException
     */
    public function setCommand(?string $command = null): self
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
        return $this->getAttribute('emailAddress');
    }

    public function setEmailAddress(?string $emailAddress = null): self
    {
        $this->setAttribute('emailAddress', $emailAddress);
        return $this;
    }

    public function getSchedule(): string
    {
        return $this->getAttribute('schedule');
    }

    public function setSchedule(?string $schedule = null): self
    {
        $this->setAttribute('schedule', $schedule);
        return $this;
    }

    public function getErrorCount(): int
    {
        return $this->getAttribute('errorCount');
    }

    public function setErrorCount(?int $errorCount = null): self
    {
        $this->setAttribute('errorCount', $errorCount);
        return $this;
    }

    public function getRandomDelayMaxSeconds(): int
    {
        return $this->getAttribute('randomDelayMaxSeconds');
    }

    public function setRandomDelayMaxSeconds(?int $randomDelayMaxSeconds = null): self
    {
        $this->setAttribute('randomDelayMaxSeconds', $randomDelayMaxSeconds);
        return $this;
    }

    public function getTimeoutSeconds(): int|null
    {
        return $this->getAttribute('timeoutSeconds');
    }

    public function setTimeoutSeconds(?int $timeoutSeconds = null): self
    {
        $this->setAttribute('timeoutSeconds', $timeoutSeconds);
        return $this;
    }

    public function getLockingEnabled(): bool
    {
        return $this->getAttribute('lockingEnabled');
    }

    public function setLockingEnabled(?bool $lockingEnabled = null): self
    {
        $this->setAttribute('lockingEnabled', $lockingEnabled);
        return $this;
    }

    public function getIsActive(): bool
    {
        return $this->getAttribute('isActive');
    }

    public function setIsActive(?bool $isActive = null): self
    {
        $this->setAttribute('isActive', $isActive);
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
            emailAddress: Arr::get($data, 'email_address'),
            timeoutSeconds: Arr::get($data, 'timeout_seconds'),
        ));
    }
}
