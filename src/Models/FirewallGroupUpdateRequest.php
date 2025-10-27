<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class FirewallGroupUpdateRequest extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function getIpNetworks(): array|null
    {
        return $this->getAttribute('ip_networks');
    }

    public function setIpNetworks(?array $ipNetworks): self
    {
        $this->setAttribute('ip_networks', $ipNetworks);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
        ))
            ->when(Arr::has($data, 'ip_networks'), fn (self $model) => $model->setIpNetworks(Arr::get($data, 'ip_networks')));
    }
}
