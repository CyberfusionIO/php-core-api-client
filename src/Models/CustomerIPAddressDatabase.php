<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class CustomerIPAddressDatabase extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(string $ipAddress, ?string $dnsName = null)
    {
        $this->setIpAddress($ipAddress);
        $this->setDnsName($dnsName);
    }

    public function getIpAddress(): string
    {
        return $this->getAttribute('ipAddress');
    }

    public function setIpAddress(?string $ipAddress = null): self
    {
        $this->setAttribute('ipAddress', $ipAddress);
        return $this;
    }

    public function getDnsName(): string|null
    {
        return $this->getAttribute('dnsName');
    }

    public function setDnsName(?string $dnsName = null): self
    {
        $this->setAttribute('dnsName', $dnsName);
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
