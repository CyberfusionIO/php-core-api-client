<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Enums\ObjectModelNameEnum;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class TombstonesSearchRequest extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function getObjectId(): int|null
    {
        return $this->getAttribute('object_id');
    }

    public function setObjectId(?int $objectId): self
    {
        $this->setAttribute('object_id', $objectId);
        return $this;
    }

    public function getObjectModelName(): ObjectModelNameEnum|null
    {
        return $this->getAttribute('object_model_name');
    }

    public function setObjectModelName(?ObjectModelNameEnum $objectModelName): self
    {
        $this->setAttribute('object_model_name', $objectModelName);
        return $this;
    }

    public function getClusterId(): int|null
    {
        return $this->getAttribute('cluster_id');
    }

    public function setClusterId(?int $clusterId): self
    {
        $this->setAttribute('cluster_id', $clusterId);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
        ))
            ->when(Arr::has($data, 'object_id'), fn (self $model) => $model->setObjectId(Arr::get($data, 'object_id')))
            ->when(Arr::has($data, 'object_model_name'), fn (self $model) => $model->setObjectModelName(Arr::get($data, 'object_model_name') !== null ? ObjectModelNameEnum::tryFrom(Arr::get($data, 'object_model_name')) : null))
            ->when(Arr::has($data, 'cluster_id'), fn (self $model) => $model->setClusterId(Arr::get($data, 'cluster_id')));
    }
}
