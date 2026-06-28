<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class CmsWoocommerceHpos extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function __construct(bool $enabled)
    {
        $this->setEnabled($enabled);
    }

    public function getEnabled(): bool
    {
        return $this->getAttribute('enabled');
    }

    public function setEnabled(bool $enabled): self
    {
        $this->setAttribute('enabled', $enabled);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            enabled: Arr::get($data, 'enabled'),
        ));
    }
}
