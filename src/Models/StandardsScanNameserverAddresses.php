<?php

namespace Cyberfusion\CoreApi\Models;

use ArrayObject;
use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class StandardsScanNameserverAddresses extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function __construct(ArrayObject $ipv4, ArrayObject $ipv6)
    {
        $this->setIpv4($ipv4);
        $this->setIpv6($ipv6);
    }

    public function getIpv4(): ArrayObject
    {
        return $this->getAttribute('ipv4');
    }

    public function setIpv4(ArrayObject $ipv4): self
    {
        $this->setAttribute('ipv4', $ipv4);
        return $this;
    }

    public function getIpv6(): ArrayObject
    {
        return $this->getAttribute('ipv6');
    }

    public function setIpv6(ArrayObject $ipv6): self
    {
        $this->setAttribute('ipv6', $ipv6);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            ipv4: new ArrayObject(Arr::get($data, 'ipv4')),
            ipv6: new ArrayObject(Arr::get($data, 'ipv6')),
        ));
    }
}
