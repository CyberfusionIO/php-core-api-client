<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Enums\UNIXUserHomeDirectoryEnum;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class ClusterUnixUsersPropertiesCreateRequest extends CoreApiModel implements CoreApiModelContract
{
    public function __construct()
    {
    }

    public function getUnixUsersHomeDirectory(): UNIXUserHomeDirectoryEnum
    {
        return $this->getAttribute('unix_users_home_directory');
    }

    public function setUnixUsersHomeDirectory(UNIXUserHomeDirectoryEnum $unixUsersHomeDirectory): self
    {
        $this->setAttribute('unix_users_home_directory', $unixUsersHomeDirectory);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
        ))
            ->setUnixUsersHomeDirectory(UNIXUserHomeDirectoryEnum::tryFrom(Arr::get($data, 'unix_users_home_directory', '/home')));
    }
}
