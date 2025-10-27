<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class CronsSearchRequest extends CoreApiModel implements CoreApiModelContract
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

    public function getNodeId(): int|null
    {
        return $this->getAttribute('node_id');
    }

    public function setNodeId(?int $nodeId): self
    {
        $this->setAttribute('node_id', $nodeId);
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

    public function getUnixUserId(): int|null
    {
        return $this->getAttribute('unix_user_id');
    }

    public function setUnixUserId(?int $unixUserId): self
    {
        $this->setAttribute('unix_user_id', $unixUserId);
        return $this;
    }

    public function getEmailAddress(): string|null
    {
        return $this->getAttribute('email_address');
    }

    public function setEmailAddress(?string $emailAddress): self
    {
        $this->setAttribute('email_address', $emailAddress);
        return $this;
    }

    public function getLockingEnabled(): bool|null
    {
        return $this->getAttribute('locking_enabled');
    }

    public function setLockingEnabled(?bool $lockingEnabled): self
    {
        $this->setAttribute('locking_enabled', $lockingEnabled);
        return $this;
    }

    public function getIsActive(): bool|null
    {
        return $this->getAttribute('is_active');
    }

    public function setIsActive(?bool $isActive): self
    {
        $this->setAttribute('is_active', $isActive);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
        ))
            ->when(Arr::has($data, 'cluster_id'), fn (self $model) => $model->setClusterId(Arr::get($data, 'cluster_id')))
            ->when(Arr::has($data, 'node_id'), fn (self $model) => $model->setNodeId(Arr::get($data, 'node_id')))
            ->when(Arr::has($data, 'name'), fn (self $model) => $model->setName(Arr::get($data, 'name')))
            ->when(Arr::has($data, 'unix_user_id'), fn (self $model) => $model->setUnixUserId(Arr::get($data, 'unix_user_id')))
            ->when(Arr::has($data, 'email_address'), fn (self $model) => $model->setEmailAddress(Arr::get($data, 'email_address')))
            ->when(Arr::has($data, 'locking_enabled'), fn (self $model) => $model->setLockingEnabled(Arr::get($data, 'locking_enabled')))
            ->when(Arr::has($data, 'is_active'), fn (self $model) => $model->setIsActive(Arr::get($data, 'is_active')));
    }
}
