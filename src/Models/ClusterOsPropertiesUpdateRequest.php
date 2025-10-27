<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class ClusterOsPropertiesUpdateRequest extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function getAutomaticUpgradesEnabled(): bool|null
    {
        return $this->getAttribute('automatic_upgrades_enabled');
    }

    public function setAutomaticUpgradesEnabled(?bool $automaticUpgradesEnabled): self
    {
        $this->setAttribute('automatic_upgrades_enabled', $automaticUpgradesEnabled);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
        ))
            ->when(Arr::has($data, 'automatic_upgrades_enabled'), fn (self $model) => $model->setAutomaticUpgradesEnabled(Arr::get($data, 'automatic_upgrades_enabled')));
    }
}
