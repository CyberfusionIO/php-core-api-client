<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class HtpasswdUsersSearchRequest extends CoreApiModel implements CoreApiModelContract
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

    public function getUsername(): string|null
    {
        return $this->getAttribute('username');
    }

    public function setUsername(?string $username): self
    {
        $this->setAttribute('username', $username);
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
            ->when(Arr::has($data, 'username'), fn (self $model) => $model->setUsername(Arr::get($data, 'username')))
            ->when(Arr::has($data, 'htpasswd_file_id'), fn (self $model) => $model->setHtpasswdFileId(Arr::get($data, 'htpasswd_file_id')));
    }
}
