<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class HtpasswdFileCreateRequest extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(int $unixUserId)
    {
        $this->setUnixUserId($unixUserId);
    }

    public function getUnixUserId(): int
    {
        return $this->getAttribute('unixUserId');
    }

    public function setUnixUserId(?int $unixUserId = null): self
    {
        $this->setAttribute('unix_user_id', $unixUserId);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            unixUserId: Arr::get($data, 'unix_user_id'),
        ));
    }
}
