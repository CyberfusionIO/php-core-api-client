<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Enums\NodeGroupEnum;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class NodesSearchRequest extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function getHostname(): string|null
    {
        return $this->getAttribute('hostname');
    }

    public function setHostname(?string $hostname): self
    {
        $this->setAttribute('hostname', $hostname);
        return $this;
    }

    public function getProduct(): string|null
    {
        return $this->getAttribute('product');
    }

    public function setProduct(?string $product): self
    {
        $this->setAttribute('product', $product);
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

    public function getGroups(): NodeGroupEnum|null
    {
        return $this->getAttribute('groups');
    }

    public function setGroups(?NodeGroupEnum $groups): self
    {
        $this->setAttribute('groups', $groups);
        return $this;
    }

    public function getComment(): string|null
    {
        return $this->getAttribute('comment');
    }

    public function setComment(?string $comment): self
    {
        $this->setAttribute('comment', $comment);
        return $this;
    }

    public function getIsReady(): bool|null
    {
        return $this->getAttribute('is_ready');
    }

    public function setIsReady(?bool $isReady): self
    {
        $this->setAttribute('is_ready', $isReady);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
        ))
            ->when(Arr::has($data, 'hostname'), fn (self $model) => $model->setHostname(Arr::get($data, 'hostname')))
            ->when(Arr::has($data, 'product'), fn (self $model) => $model->setProduct(Arr::get($data, 'product')))
            ->when(Arr::has($data, 'cluster_id'), fn (self $model) => $model->setClusterId(Arr::get($data, 'cluster_id')))
            ->when(Arr::has($data, 'groups'), fn (self $model) => $model->setGroups(Arr::get($data, 'groups') !== null ? NodeGroupEnum::tryFrom(Arr::get($data, 'groups')) : null))
            ->when(Arr::has($data, 'comment'), fn (self $model) => $model->setComment(Arr::get($data, 'comment')))
            ->when(Arr::has($data, 'is_ready'), fn (self $model) => $model->setIsReady(Arr::get($data, 'is_ready')));
    }
}
