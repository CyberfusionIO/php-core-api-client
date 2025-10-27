<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class FpmPoolsSearchRequest extends CoreApiModel implements CoreApiModelContract
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

    public function getName(): string|null
    {
        return $this->getAttribute('name');
    }

    public function setName(?string $name): self
    {
        $this->setAttribute('name', $name);
        return $this;
    }

    public function getVersion(): string|null
    {
        return $this->getAttribute('version');
    }

    public function setVersion(?string $version): self
    {
        $this->setAttribute('version', $version);
        return $this;
    }

    public function getUnixUserId(): int|null
    {
        return $this->getAttribute('unix_user_id');
    }

    public function setUnixUserId(?int $unixUserId): self
    {
        $this->setAttribute('unix_user_id', $unixUserId);
        return $this;
    }

    public function getMaxChildren(): int|null
    {
        return $this->getAttribute('max_children');
    }

    public function setMaxChildren(?int $maxChildren): self
    {
        $this->setAttribute('max_children', $maxChildren);
        return $this;
    }

    public function getIsNamespaced(): bool|null
    {
        return $this->getAttribute('is_namespaced');
    }

    public function setIsNamespaced(?bool $isNamespaced): self
    {
        $this->setAttribute('is_namespaced', $isNamespaced);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
        ))
            ->when(Arr::has($data, 'cluster_id'), fn (self $model) => $model->setClusterId(Arr::get($data, 'cluster_id')))
            ->when(Arr::has($data, 'name'), fn (self $model) => $model->setName(Arr::get($data, 'name')))
            ->when(Arr::has($data, 'version'), fn (self $model) => $model->setVersion(Arr::get($data, 'version')))
            ->when(Arr::has($data, 'unix_user_id'), fn (self $model) => $model->setUnixUserId(Arr::get($data, 'unix_user_id')))
            ->when(Arr::has($data, 'max_children'), fn (self $model) => $model->setMaxChildren(Arr::get($data, 'max_children')))
            ->when(Arr::has($data, 'is_namespaced'), fn (self $model) => $model->setIsNamespaced(Arr::get($data, 'is_namespaced')));
    }
}
