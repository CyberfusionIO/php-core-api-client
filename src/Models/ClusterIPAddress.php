<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class ClusterIPAddress extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(string $ipAddress, bool $l3DdosProtectionEnabled, ?string $dnsName = null)
    {
        $this->setIpAddress($ipAddress);
        $this->setL3DdosProtectionEnabled($l3DdosProtectionEnabled);
        $this->setDnsName($dnsName);
    }

    public function getIpAddress(): string
    {
        return $this->getAttribute('ipAddress');
    }

    public function setIpAddress(?string $ipAddress = null): self
    {
        $this->setAttribute('ip_address', $ipAddress);
        return $this;
    }

    public function getDnsName(): string|null
    {
        return $this->getAttribute('dnsName');
    }

    public function setDnsName(?string $dnsName = null): self
    {
        $this->setAttribute('dns_name', $dnsName);
        return $this;
    }

    public function getL3DdosProtectionEnabled(): bool
    {
        return $this->getAttribute('l3DdosProtectionEnabled');
    }

    public function setL3DdosProtectionEnabled(?bool $l3DdosProtectionEnabled = null): self
    {
        $this->setAttribute('l3_ddos_protection_enabled', $l3DdosProtectionEnabled);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            ipAddress: Arr::get($data, 'ip_address'),
            l3DdosProtectionEnabled: Arr::get($data, 'l3_ddos_protection_enabled'),
            dnsName: Arr::get($data, 'dns_name'),
        ));
    }
}
