<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Enums\TaskStateEnum;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class TaskResult extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(
        string $description,
        string $uuid,
        TaskStateEnum $state,
        int $retries,
        ?string $message = null,
    ) {
        $this->setDescription($description);
        $this->setUuid($uuid);
        $this->setState($state);
        $this->setRetries($retries);
        $this->setMessage($message);
    }

    public function getDescription(): string
    {
        return $this->getAttribute('description');
    }

    /**
     * @throws ValidationException
     */
    public function setDescription(?string $description = null): self
    {
        Validator::create()
            ->length(min: 1, max: 65535)
            ->regex('/^[ -~]+$/')
            ->assert($description);
        $this->setAttribute('description', $description);
        return $this;
    }

    public function getUuid(): string
    {
        return $this->getAttribute('uuid');
    }

    public function setUuid(?string $uuid = null): self
    {
        $this->setAttribute('uuid', $uuid);
        return $this;
    }

    public function getMessage(): string|null
    {
        return $this->getAttribute('message');
    }

    public function setMessage(?string $message = null): self
    {
        $this->setAttribute('message', $message);
        return $this;
    }

    public function getState(): TaskStateEnum
    {
        return $this->getAttribute('state');
    }

    public function setState(?TaskStateEnum $state = null): self
    {
        $this->setAttribute('state', $state);
        return $this;
    }

    public function getRetries(): int
    {
        return $this->getAttribute('retries');
    }

    public function setRetries(?int $retries = null): self
    {
        $this->setAttribute('retries', $retries);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            description: Arr::get($data, 'description'),
            uuid: Arr::get($data, 'uuid'),
            state: TaskStateEnum::tryFrom(Arr::get($data, 'state')),
            retries: Arr::get($data, 'retries'),
            message: Arr::get($data, 'message'),
        ));
    }
}
