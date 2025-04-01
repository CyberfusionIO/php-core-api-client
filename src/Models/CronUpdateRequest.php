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

    public function getEmailAddress(): string|null
    {
        return $this->getAttribute('emailAddress');
    }

    public function setEmailAddress(?string $emailAddress): self
    {
        $this->setAttribute('emailAddress', $emailAddress);
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
        return $this->getAttribute('errorCount');
    }

    public function setErrorCount(int $errorCount): self
    {
        $this->setAttribute('errorCount', $errorCount);
        return $this;
    }

    public function getRandomDelayMaxSeconds(): int
    {
        return $this->getAttribute('randomDelayMaxSeconds');
    }

    public function setRandomDelayMaxSeconds(int $randomDelayMaxSeconds): self
    {
        $this->setAttribute('randomDelayMaxSeconds', $randomDelayMaxSeconds);
        return $this;
    }

    public function getTimeoutSeconds(): int|null
    {
        return $this->getAttribute('timeoutSeconds');
    }

    public function setTimeoutSeconds(?int $timeoutSeconds): self
    {
        $this->setAttribute('timeoutSeconds', $timeoutSeconds);
        return $this;
    }

    public function getLockingEnabled(): bool
    {
        return $this->getAttribute('lockingEnabled');
    }

    public function setLockingEnabled(bool $lockingEnabled): self
    {
        $this->setAttribute('lockingEnabled', $lockingEnabled);
        return $this;
    }

    public function getIsActive(): bool
    {
        return $this->getAttribute('isActive');
    }

    public function setIsActive(bool $isActive): self
    {
        $this->setAttribute('isActive', $isActive);
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
            ->setIsActive(Arr::get($data, 'is_active'));
    }
}
