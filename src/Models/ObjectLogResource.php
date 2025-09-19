<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Enums\CauserTypeEnum;
use Cyberfusion\CoreApi\Enums\ObjectLogTypeEnum;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class ObjectLogResource extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(
        int $id,
        string $createdAt,
        string $updatedAt,
        int $objectId,
        ObjectLogTypeEnum $type,
        ?string $objectModelName = null,
        ?string $requestId = null,
        ?CauserTypeEnum $causerType = null,
        ?int $causerId = null,
        ?int $customerId = null,
    ) {
        $this->setId($id);
        $this->setCreatedAt($createdAt);
        $this->setUpdatedAt($updatedAt);
        $this->setObjectId($objectId);
        $this->setType($type);
        $this->setObjectModelName($objectModelName);
        $this->setRequestId($requestId);
        $this->setCauserType($causerType);
        $this->setCauserId($causerId);
        $this->setCustomerId($customerId);
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

    public function getObjectId(): int
    {
        return $this->getAttribute('object_id');
    }

    public function setObjectId(?int $objectId = null): self
    {
        $this->setAttribute('object_id', $objectId);
        return $this;
    }

    public function getObjectModelName(): string|null
    {
        return $this->getAttribute('object_model_name');
    }

    public function setObjectModelName(?string $objectModelName = null): self
    {
        $this->setAttribute('object_model_name', $objectModelName);
        return $this;
    }

    public function getRequestId(): string|null
    {
        return $this->getAttribute('request_id');
    }

    public function setRequestId(?string $requestId = null): self
    {
        $this->setAttribute('request_id', $requestId);
        return $this;
    }

    public function getType(): ObjectLogTypeEnum
    {
        return $this->getAttribute('type');
    }

    public function setType(?ObjectLogTypeEnum $type = null): self
    {
        $this->setAttribute('type', $type);
        return $this;
    }

    public function getCauserType(): CauserTypeEnum|null
    {
        return $this->getAttribute('causer_type');
    }

    public function setCauserType(?CauserTypeEnum $causerType = null): self
    {
        $this->setAttribute('causer_type', $causerType);
        return $this;
    }

    public function getCauserId(): int|null
    {
        return $this->getAttribute('causer_id');
    }

    public function setCauserId(?int $causerId = null): self
    {
        $this->setAttribute('causer_id', $causerId);
        return $this;
    }

    public function getCustomerId(): int|null
    {
        return $this->getAttribute('customer_id');
    }

    public function setCustomerId(?int $customerId = null): self
    {
        $this->setAttribute('customer_id', $customerId);
        return $this;
    }

    public function getIncludes(): ObjectLogIncludes|null
    {
        return $this->getAttribute('includes');
    }

    public function setIncludes(?ObjectLogIncludes $includes): self
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
            objectId: Arr::get($data, 'object_id'),
            type: ObjectLogTypeEnum::tryFrom(Arr::get($data, 'type')),
            objectModelName: Arr::get($data, 'object_model_name'),
            requestId: Arr::get($data, 'request_id'),
            causerType: Arr::get($data, 'causer_type') !== null ? CauserTypeEnum::tryFrom(Arr::get($data, 'causer_type')) : null,
            causerId: Arr::get($data, 'causer_id'),
            customerId: Arr::get($data, 'customer_id'),
        ))
            ->setIncludes(Arr::get($data, 'includes') !== null ? ObjectLogIncludes::fromArray(Arr::get($data, 'includes')) : null);
    }
}
