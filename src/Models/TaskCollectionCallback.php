<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class TaskCollectionCallback extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(string $taskCollectionUuid, bool $success)
    {
        $this->setTaskCollectionUuid($taskCollectionUuid);
        $this->setSuccess($success);
    }

    public function getTaskCollectionUuid(): string
    {
        return $this->getAttribute('task_collection_uuid');
    }

    public function setTaskCollectionUuid(?string $taskCollectionUuid = null): self
    {
        $this->setAttribute('task_collection_uuid', $taskCollectionUuid);
        return $this;
    }

    public function getSuccess(): bool
    {
        return $this->getAttribute('success');
    }

    public function setSuccess(?bool $success = null): self
    {
        $this->setAttribute('success', $success);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            taskCollectionUuid: Arr::get($data, 'task_collection_uuid'),
            success: Arr::get($data, 'success'),
        ));
    }
}
