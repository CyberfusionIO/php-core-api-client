<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Enums\ObjectModelNameEnum;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class TombstoneResource extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function __construct(
        int $id,
        string $createdAt,
        string $updatedAt,
        string $data,
        int $objectId,
        ObjectModelNameEnum $objectModelName,
        int $clusterId,
        TombstoneIncludes $includes,
    ) {
        $this->setId($id);
        $this->setCreatedAt($createdAt);
        $this->setUpdatedAt($updatedAt);
        $this->setData($data);
        $this->setObjectId($objectId);
        $this->setObjectModelName($objectModelName);
        $this->setClusterId($clusterId);
        $this->setIncludes($includes);
    }

    public function getId(): int
    {
        return $this->getAttribute('id');
    }

    public function setId(int $id): self
    {
        $this->setAttribute('id', $id);
        return $this;
    }

    public function getCreatedAt(): string
    {
        return $this->getAttribute('created_at');
    }

    public function setCreatedAt(string $createdAt): self
    {
        $this->setAttribute('created_at', $createdAt);
        return $this;
    }

    public function getUpdatedAt(): string
    {
        return $this->getAttribute('updated_at');
    }

    public function setUpdatedAt(string $updatedAt): self
    {
        $this->setAttribute('updated_at', $updatedAt);
        return $this;
    }

    public function getData(): string
    {
        return $this->getAttribute('data');
    }

    public function setData(string $data): self
    {
        $this->setAttribute('data', $data);
        return $this;
    }

    public function getObjectId(): int
    {
        return $this->getAttribute('object_id');
    }

    public function setObjectId(int $objectId): self
    {
        $this->setAttribute('object_id', $objectId);
        return $this;
    }

    public function getObjectModelName(): ObjectModelNameEnum
    {
        return $this->getAttribute('object_model_name');
    }

    public function setObjectModelName(ObjectModelNameEnum $objectModelName): self
    {
        $this->setAttribute('object_model_name', $objectModelName);
        return $this;
    }

    public function getClusterId(): int
    {
        return $this->getAttribute('cluster_id');
    }

    public function setClusterId(int $clusterId): self
    {
        $this->setAttribute('cluster_id', $clusterId);
        return $this;
    }

    public function getIncludes(): TombstoneIncludes
    {
        return $this->getAttribute('includes');
    }

    public function setIncludes(TombstoneIncludes $includes): self
    {
        $this->setAttribute('includes', $includes);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            id: Arr::get($data, 'id'),
            createdAt: Arr::get($data, 'created_at'),
            updatedAt: Arr::get($data, 'updated_at'),
            data: Arr::get($data, 'data'),
            objectId: Arr::get($data, 'object_id'),
            objectModelName: ObjectModelNameEnum::tryFrom(Arr::get($data, 'object_model_name')),
            clusterId: Arr::get($data, 'cluster_id'),
            includes: TombstoneIncludes::fromArray(Arr::get($data, 'includes')),
        ));
    }
}
