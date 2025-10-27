<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class BasicAuthenticationRealmsSearchRequest extends CoreApiModel implements CoreApiModelContract
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

    public function getVirtualHostId(): int|null
    {
        return $this->getAttribute('virtual_host_id');
    }

    public function setVirtualHostId(?int $virtualHostId): self
    {
        $this->setAttribute('virtual_host_id', $virtualHostId);
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

    public function getHtpasswdFileId(): int|null
    {
        return $this->getAttribute('htpasswd_file_id');
    }

    public function setHtpasswdFileId(?int $htpasswdFileId): self
    {
        $this->setAttribute('htpasswd_file_id', $htpasswdFileId);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
        ))
            ->when(Arr::has($data, 'cluster_id'), fn (self $model) => $model->setClusterId(Arr::get($data, 'cluster_id')))
            ->when(Arr::has($data, 'virtual_host_id'), fn (self $model) => $model->setVirtualHostId(Arr::get($data, 'virtual_host_id')))
            ->when(Arr::has($data, 'name'), fn (self $model) => $model->setName(Arr::get($data, 'name')))
            ->when(Arr::has($data, 'htpasswd_file_id'), fn (self $model) => $model->setHtpasswdFileId(Arr::get($data, 'htpasswd_file_id')));
    }
}
