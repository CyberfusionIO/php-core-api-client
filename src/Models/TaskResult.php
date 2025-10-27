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

    public static function fromArray(array $data): self
    {
        return (new self(
            description: Arr::get($data, 'description'),
            uuid: Arr::get($data, 'uuid'),
            state: TaskStateEnum::tryFrom(Arr::get($data, 'state')),
            retries: Arr::get($data, 'retries'),
            freeFormData: new ArrayObject(Arr::get($data, 'free_form_data')),
            message: Arr::get($data, 'message'),
        ));
    }
}
