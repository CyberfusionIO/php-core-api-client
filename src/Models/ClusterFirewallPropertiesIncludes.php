<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class ClusterFirewallPropertiesIncludes extends CoreApiModel implements CoreApiModelContract
{
    public function __construct()
    {
    }

    public static function fromArray(array $data): self
    {
        return new self();
    }
}
