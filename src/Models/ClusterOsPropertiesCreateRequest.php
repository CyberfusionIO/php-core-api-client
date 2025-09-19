<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class ClusterOsPropertiesCreateRequest extends CoreApiModel implements CoreApiModelContract
{
    public function __construct()
    {
    }

    public function getAutomaticUpgradesEnabled(): bool
    {
        return $this->getAttribute('automatic_upgrades_enabled');
    }

    public function setAutomaticUpgradesEnabled(bool $automaticUpgradesEnabled): self
    {
        $this->setAttribute('automatic_upgrades_enabled', $automaticUpgradesEnabled);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
        ))
            ->setAutomaticUpgradesEnabled(Arr::get($data, 'automatic_upgrades_enabled', false));
    }
}
