<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class ClusterDeploymentResults extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(string $createdAt, ?array $tasksResults = null)
    {
        $this->setCreatedAt($createdAt);
        $this->setTasksResults($tasksResults);
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

    public function getTasksResults(): array|null
    {
        return $this->getAttribute('tasksResults');
    }

    public function setTasksResults(?array $tasksResults = []): self
    {
        $this->setAttribute('tasksResults', $tasksResults);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            createdAt: Arr::get($data, 'created_at'),
            tasksResults: Arr::get($data, 'tasks_results'),
        ));
    }
}
