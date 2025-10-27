<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Enums\UNIXUserHomeDirectoryEnum;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class ClustersUnixUsersPropertiesSearchRequest extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function getUnixUsersHomeDirectory(): UNIXUserHomeDirectoryEnum|null
    {
        return $this->getAttribute('unix_users_home_directory');
    }

    public function setUnixUsersHomeDirectory(?UNIXUserHomeDirectoryEnum $unixUsersHomeDirectory): self
    {
        $this->setAttribute('unix_users_home_directory', $unixUsersHomeDirectory);
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

    public static function fromArray(array $data): self
    {
        return (new self(
        ))
            ->when(Arr::has($data, 'unix_users_home_directory'), fn (self $model) => $model->setUnixUsersHomeDirectory(Arr::get($data, 'unix_users_home_directory') !== null ? UNIXUserHomeDirectoryEnum::tryFrom(Arr::get($data, 'unix_users_home_directory')) : null))
            ->when(Arr::has($data, 'cluster_id'), fn (self $model) => $model->setClusterId(Arr::get($data, 'cluster_id')));
    }
}
