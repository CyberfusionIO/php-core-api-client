<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class TombstoneDataHtpasswdFileIncludes extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(UNIXUserResource|TombstoneDataUNIXUser $unixUser)
    {
        $this->setUnixUser($unixUser);
    }

    public function getUnixUser(): UNIXUserResource|TombstoneDataUNIXUser
    {
        return $this->getAttribute('unix_user');
    }

    public function setUnixUser(UNIXUserResource|TombstoneDataUNIXUser|null $unixUser = null): self
    {
        $this->setAttribute('unix_user', $unixUser);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            unixUser: UNIXUserResource::fromArray(Arr::get($data, 'unix_user')),
        ));
    }
}
