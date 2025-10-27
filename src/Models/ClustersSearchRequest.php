<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class ClustersSearchRequest extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function getName(): string|null
    {
        return $this->getAttribute('name');
    }

    public function setName(?string $name): self
    {
        $this->setAttribute('name', $name);
        return $this;
    }

    public function getRegionId(): int|null
    {
        return $this->getAttribute('region_id');
    }

    public function setRegionId(?int $regionId): self
    {
        $this->setAttribute('region_id', $regionId);
        return $this;
    }

    public function getDescription(): string|null
    {
        return $this->getAttribute('description');
    }

    public function setDescription(?string $description): self
    {
        $this->setAttribute('description', $description);
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
            ->when(Arr::has($data, 'name'), fn (self $model) => $model->setName(Arr::get($data, 'name')))
            ->when(Arr::has($data, 'region_id'), fn (self $model) => $model->setRegionId(Arr::get($data, 'region_id')))
            ->when(Arr::has($data, 'description'), fn (self $model) => $model->setDescription(Arr::get($data, 'description')))
            ->when(Arr::has($data, 'customer_id'), fn (self $model) => $model->setCustomerId(Arr::get($data, 'customer_id')));
    }
}
