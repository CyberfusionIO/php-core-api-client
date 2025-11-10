<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class CmsConfigurationConstant extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function __construct(string|int|float|bool $value, string $name)
    {
        $this->setValue($value);
        $this->setName($name);
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

    public function getName(): string
    {
        return $this->getAttribute('name');
    }

    /**
     * @throws ValidationException
     */
    public function setName(string $name): self
    {
        Validator::create()
            ->length(min: 1)
            ->regex('/^[a-zA-Z0-9_]+$/')
            ->assert($name);
        $this->setAttribute('name', $name);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            value: Arr::get($data, 'value'),
            name: Arr::get($data, 'name'),
        ))
            ->when(Arr::has($data, 'index'), fn (self $model) => $model->setIndex(Arr::get($data, 'index')));
    }
}
