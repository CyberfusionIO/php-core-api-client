<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class CustomerIPAddressDatabase extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function __construct(string $ipAddress, ?string $dnsName = null)
    {
        $this->setIpAddress($ipAddress);
        $this->setDnsName($dnsName);
    }

    public function getIpAddress(): string
    {
        return $this->getAttribute('ip_address');
    }

    public function setIpAddress(string $ipAddress): self
    {
        $this->setAttribute('ip_address', $ipAddress);
        return $this;
    }

    public function getDnsName(): string|null
    {
        return $this->getAttribute('dns_name');
    }

    public function setDnsName(?string $dnsName): self
    {
        $this->setAttribute('dns_name', $dnsName);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            ipAddress: Arr::get($data, 'ip_address'),
            dnsName: Arr::get($data, 'dns_name'),
        ));
    }
}
