<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Enums\CmsOptionNameEnum;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class CmsOption extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function __construct(int $value, CmsOptionNameEnum $name)
    {
        $this->setValue($value);
        $this->setName($name);
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

    public function getName(): CmsOptionNameEnum
    {
        return $this->getAttribute('name');
    }

    public function setName(CmsOptionNameEnum $name): self
    {
        $this->setAttribute('name', $name);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            value: Arr::get($data, 'value'),
            name: CmsOptionNameEnum::tryFrom(Arr::get($data, 'name')),
        ));
    }
}
