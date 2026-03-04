<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class FpmPoolUpdateSettingPairTidewaysApiKeyRequest extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function __construct(string $setting, string $value)
    {
        $this->setSetting($setting);
        $this->setValue($value);
    }

    public function getSetting(): string
    {
        return $this->getAttribute('setting');
    }

    public function setSetting(string $setting): self
    {
        $this->setAttribute('setting', $setting);
        return $this;
    }

    public function getValue(): string
    {
        return $this->getAttribute('value');
    }

    /**
     * @throws ValidationException
     */
    public function setValue(string $value): self
    {
        Validator::create()
            ->length(min: 16, max: 32)
            ->regex('/^[a-zA-Z0-9_]+$/')
            ->assert($value);
        $this->setAttribute('value', $value);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            setting: Arr::get($data, 'setting'),
            value: Arr::get($data, 'value'),
        ));
    }
}
