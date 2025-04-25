<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Enums\ObjectModelNameEnum;
use Cyberfusion\CoreApi\Enums\TaskCollectionTypeEnum;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class TaskCollectionResource extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(
        int $id,
        string $createdAt,
        string $updatedAt,
        ObjectModelNameEnum $objectModelName,
        string $uuid,
        string $description,
        TaskCollectionTypeEnum $collectionType,
        string $reference,
        ?int $objectId = null,
        ?int $clusterId = null,
    ) {
        $this->setId($id);
        $this->setCreatedAt($createdAt);
        $this->setUpdatedAt($updatedAt);
        $this->setObjectModelName($objectModelName);
        $this->setUuid($uuid);
        $this->setDescription($description);
        $this->setCollectionType($collectionType);
        $this->setReference($reference);
        $this->setObjectId($objectId);
        $this->setClusterId($clusterId);
    }

    public function getId(): int
    {
        return $this->getAttribute('id');
    }

    public function setId(?int $id = null): self
    {
        $this->setAttribute('id', $id);
        return $this;
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

    public function getUpdatedAt(): string
    {
        return $this->getAttribute('updated_at');
    }

    public function setUpdatedAt(?string $updatedAt = null): self
    {
        $this->setAttribute('updated_at', $updatedAt);
        return $this;
    }

    public function getObjectId(): int|null
    {
        return $this->getAttribute('object_id');
    }

    public function setObjectId(?int $objectId = null): self
    {
        $this->setAttribute('object_id', $objectId);
        return $this;
    }

    public function getObjectModelName(): ObjectModelNameEnum
    {
        return $this->getAttribute('object_model_name');
    }

    public function setObjectModelName(?ObjectModelNameEnum $objectModelName = null): self
    {
        $this->setAttribute('object_model_name', $objectModelName);
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

    public function getCollectionType(): TaskCollectionTypeEnum
    {
        return $this->getAttribute('collection_type');
    }

    public function setCollectionType(?TaskCollectionTypeEnum $collectionType = null): self
    {
        $this->setAttribute('collection_type', $collectionType);
        return $this;
    }

    public function getClusterId(): int|null
    {
        return $this->getAttribute('cluster_id');
    }

    public function setClusterId(?int $clusterId = null): self
    {
        $this->setAttribute('cluster_id', $clusterId);
        return $this;
    }

    public function getReference(): string
    {
        return $this->getAttribute('reference');
    }

    /**
     * @throws ValidationException
     */
    public function setReference(?string $reference = null): self
    {
        Validator::create()
            ->length(min: 1, max: 255)
            ->regex('/^[a-zA-Z0-9-_ ]+$/')
            ->assert($reference);
        $this->setAttribute('reference', $reference);
        return $this;
    }

    public function getIncludes(): TaskCollectionIncludes|null
    {
        return $this->getAttribute('includes');
    }

    public function setIncludes(?TaskCollectionIncludes $includes): self
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
            objectModelName: ObjectModelNameEnum::tryFrom(Arr::get($data, 'object_model_name')),
            uuid: Arr::get($data, 'uuid'),
            description: Arr::get($data, 'description'),
            collectionType: TaskCollectionTypeEnum::tryFrom(Arr::get($data, 'collection_type')),
            reference: Arr::get($data, 'reference'),
            objectId: Arr::get($data, 'object_id'),
            clusterId: Arr::get($data, 'cluster_id'),
        ))
            ->setIncludes(Arr::get($data, 'includes') !== null ? TaskCollectionIncludes::fromArray(Arr::get($data, 'includes')) : null);
    }
}
