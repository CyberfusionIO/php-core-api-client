<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class FirewallGroupUpdateRequest extends CoreApiModel implements CoreApiModelContract
{
    public function __construct()
    {
    }

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
            ->setIpNetworks(Arr::get($data, 'ip_networks'));
    }
}
