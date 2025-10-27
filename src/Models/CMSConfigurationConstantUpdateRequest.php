<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class CMSConfigurationConstantUpdateRequest extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function __construct(string|int|float|bool $value)
    {
        $this->setValue($value);
    }

    public function getValue(): string|int|float|bool
    {
        return $this->getAttribute('value');
    }

    public function setValue(string|int|float|bool $value): self
    {
        $this->setAttribute('value', $value);
        return $this;
    }

    public function getIndex(): int|null
    {
        return $this->getAttribute('index');
    }

    public function setIndex(?int $index): self
    {
        $this->setAttribute('index', $index);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            value: Arr::get($data, 'value'),
        ))
            ->when(Arr::has($data, 'index'), fn (self $model) => $model->setIndex(Arr::get($data, 'index')));
    }
}
