<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class BorgArchivesSearchRequest extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function getClusterId(): int|null
    {
        return $this->getAttribute('cluster_id');
    }

    public function setClusterId(?int $clusterId): self
    {
        $this->setAttribute('cluster_id', $clusterId);
        return $this;
    }

    public function getBorgRepositoryId(): int|null
    {
        return $this->getAttribute('borg_repository_id');
    }

    public function setBorgRepositoryId(?int $borgRepositoryId): self
    {
        $this->setAttribute('borg_repository_id', $borgRepositoryId);
        return $this;
    }

    public function getName(): string|null
    {
        return $this->getAttribute('name');
    }

    public function setName(?string $name): self
    {
        $this->setAttribute('name', $name);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
        ))
            ->when(Arr::has($data, 'cluster_id'), fn (self $model) => $model->setClusterId(Arr::get($data, 'cluster_id')))
            ->when(Arr::has($data, 'borg_repository_id'), fn (self $model) => $model->setBorgRepositoryId(Arr::get($data, 'borg_repository_id')))
            ->when(Arr::has($data, 'name'), fn (self $model) => $model->setName(Arr::get($data, 'name')));
    }
}
