<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class CmsOptionUpdateRequest extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function __construct(int $value)
    {
        $this->setValue($value);
    }

    public function getValue(): int
    {
        return $this->getAttribute('value');
    }

    public function setValue(int $value): self
    {
        $this->setAttribute('value', $value);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            value: Arr::get($data, 'value'),
        ));
    }
}
