<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class ClusterDeploymentResults extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(string $createdAt, array $tasksResults)
    {
        $this->setCreatedAt($createdAt);
        $this->setTasksResults($tasksResults);
    }

    public function getCreatedAt(): string
    {
        return $this->getAttribute('created_at');
    }

    public function setCreatedAt(?string $createdAt = null): self
    {
        $this->setAttribute('created_at', $createdAt);
        return $this;
    }

    public function getTasksResults(): array
    {
        return $this->getAttribute('tasks_results');
    }

    public function setTasksResults(array $tasksResults = []): self
    {
        $this->setAttribute('tasks_results', $tasksResults);
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
