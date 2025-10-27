<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class UNIXUsersHomeDirectoryUsageIncludes extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public static function fromArray(array $data): self
    {
        return new self();
    }
}
