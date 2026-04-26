<?php

namespace Cyberfusion\CoreApi\Models;

use ArrayObject;
use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Enums\TaskStateEnum;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class TaskResult extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function __construct(
        string $description,
        string $uuid,
        TaskStateEnum $state,
        int $retries,
        ArrayObject $freeFormData,
        ?string $message = null,
    ) {
        $this->setDescription($description);
        $this->setUuid($uuid);
        $this->setState($state);
        $this->setRetries($retries);
        $this->setFreeFormData($freeFormData);
        $this->setMessage($message);
    }

    public function getDescription(): string
    {
        return $this->getAttribute('description');
    }

    /**
     * @throws ValidationException
     */
    public function setDescription(string $description): self
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

    public function setUuid(string $uuid): self
    {
        $this->setAttribute('uuid', $uuid);
        return $this;
    }

    public function getMessage(): string|null
    {
        return $this->getAttribute('message');
    }

    public function setMessage(?string $message): self
    {
        $this->setAttribute('message', $message);
        return $this;
    }

    public function getState(): TaskStateEnum
    {
        return $this->getAttribute('state');
    }

    public function setState(TaskStateEnum $state): self
    {
        $this->setAttribute('state', $state);
        return $this;
    }

    public function getRetries(): int
    {
        return $this->getAttribute('retries');
    }

    public function setRetries(int $retries): self
    {
        $this->setAttribute('retries', $retries);
        return $this;
    }

    public function getFreeFormData(): ArrayObject
    {
        return $this->getAttribute('free_form_data');
    }

    public function setFreeFormData(ArrayObject $freeFormData): self
    {
        $this->setAttribute('free_form_data', $freeFormData);
        return $this;
    }

    public function getStartedAt(): string|null
    {
        return $this->getAttribute('started_at');
    }

    public function setStartedAt(?string $startedAt): self
    {
        $this->setAttribute('started_at', $startedAt);
        return $this;
    }

    public function getCompletedAt(): string|null
    {
        return $this->getAttribute('completed_at');
    }

    public function setCompletedAt(?string $completedAt): self
    {
        $this->setAttribute('completed_at', $completedAt);
        return $this;
    }

    public function getDurationHumanReadable(): string|null
    {
        return $this->getAttribute('duration_human_readable');
    }

    public function setDurationHumanReadable(?string $durationHumanReadable): self
    {
        $this->setAttribute('duration_human_readable', $durationHumanReadable);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            description: Arr::get($data, 'description'),
            uuid: Arr::get($data, 'uuid'),
            state: TaskStateEnum::tryFrom(Arr::get($data, 'state')),
            retries: Arr::get($data, 'retries'),
            freeFormData: new ArrayObject(Arr::get($data, 'free_form_data')),
            message: Arr::get($data, 'message'),
        ))
            ->when(Arr::has($data, 'started_at'), fn (self $model) => $model->setStartedAt(Arr::get($data, 'started_at')))
            ->when(Arr::has($data, 'completed_at'), fn (self $model) => $model->setCompletedAt(Arr::get($data, 'completed_at')))
            ->when(Arr::has($data, 'duration_human_readable'), fn (self $model) => $model->setDurationHumanReadable(Arr::get($data, 'duration_human_readable')));
    }
}
