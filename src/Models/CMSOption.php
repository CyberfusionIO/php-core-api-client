<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Enums\CMSOptionNameEnum;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class CMSOption extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(int $value, CMSOptionNameEnum $name)
    {
        $this->setValue($value);
        $this->setName($name);
    }

    public function getValue(): int
    {
        return $this->getAttribute('value');
    }

    public function setValue(?int $value = null): self
    {
        $this->setAttribute('value', $value);
        return $this;
    }

    public function getName(): CMSOptionNameEnum
    {
        return $this->getAttribute('name');
    }

    public function setName(?CMSOptionNameEnum $name = null): self
    {
        $this->setAttribute('name', $name);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            value: Arr::get($data, 'value'),
            name: CMSOptionNameEnum::tryFrom(Arr::get($data, 'name')),
        ));
    }
}
