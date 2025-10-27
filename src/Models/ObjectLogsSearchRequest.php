<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Enums\CauserTypeEnum;
use Cyberfusion\CoreApi\Enums\ObjectLogTypeEnum;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class ObjectLogsSearchRequest extends CoreApiModel implements CoreApiModelContract
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

    public function getObjectModelName(): string|null
    {
        return $this->getAttribute('object_model_name');
    }

    public function setObjectModelName(?string $objectModelName): self
    {
        $this->setAttribute('object_model_name', $objectModelName);
        return $this;
    }

    public function getRequestId(): string|null
    {
        return $this->getAttribute('request_id');
    }

    public function setRequestId(?string $requestId): self
    {
        $this->setAttribute('request_id', $requestId);
        return $this;
    }

    public function getType(): ObjectLogTypeEnum|null
    {
        return $this->getAttribute('type');
    }

    public function setType(?ObjectLogTypeEnum $type): self
    {
        $this->setAttribute('type', $type);
        return $this;
    }

    public function getCauserType(): CauserTypeEnum|null
    {
        return $this->getAttribute('causer_type');
    }

    public function setCauserType(?CauserTypeEnum $causerType): self
    {
        $this->setAttribute('causer_type', $causerType);
        return $this;
    }

    public function getCauserId(): int|null
    {
        return $this->getAttribute('causer_id');
    }

    public function setCauserId(?int $causerId): self
    {
        $this->setAttribute('causer_id', $causerId);
        return $this;
    }

    public function getCustomerId(): int|null
    {
        return $this->getAttribute('customer_id');
    }

    public function setCustomerId(?int $customerId): self
    {
        $this->setAttribute('customer_id', $customerId);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
        ))
            ->when(Arr::has($data, 'object_id'), fn (self $model) => $model->setObjectId(Arr::get($data, 'object_id')))
            ->when(Arr::has($data, 'object_model_name'), fn (self $model) => $model->setObjectModelName(Arr::get($data, 'object_model_name')))
            ->when(Arr::has($data, 'request_id'), fn (self $model) => $model->setRequestId(Arr::get($data, 'request_id')))
            ->when(Arr::has($data, 'type'), fn (self $model) => $model->setType(Arr::get($data, 'type') !== null ? ObjectLogTypeEnum::tryFrom(Arr::get($data, 'type')) : null))
            ->when(Arr::has($data, 'causer_type'), fn (self $model) => $model->setCauserType(Arr::get($data, 'causer_type') !== null ? CauserTypeEnum::tryFrom(Arr::get($data, 'causer_type')) : null))
            ->when(Arr::has($data, 'causer_id'), fn (self $model) => $model->setCauserId(Arr::get($data, 'causer_id')))
            ->when(Arr::has($data, 'customer_id'), fn (self $model) => $model->setCustomerId(Arr::get($data, 'customer_id')));
    }
}
