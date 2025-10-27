<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Enums\TaskStateEnum;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class ClusterDeploymentTaskResult extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function __construct(string $description, TaskStateEnum $state, ?string $message = null)
    {
        $this->setDescription($description);
        $this->setState($state);
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

    public static function fromArray(array $data): self
    {
        return (new self(
            description: Arr::get($data, 'description'),
            state: TaskStateEnum::tryFrom(Arr::get($data, 'state')),
            message: Arr::get($data, 'message'),
        ));
    }
}
