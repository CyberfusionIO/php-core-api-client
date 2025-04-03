<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Enums\IPAddressFamilyEnum;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class ClusterIPAddressCreateRequest extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(string $serviceAccountName, string $dnsName, IPAddressFamilyEnum $addressFamily)
    {
        $this->setServiceAccountName($serviceAccountName);
        $this->setDnsName($dnsName);
        $this->setAddressFamily($addressFamily);
    }

    public function getServiceAccountName(): string
    {
        return $this->getAttribute('service_account_name');
    }

    public function setServiceAccountName(?string $serviceAccountName = null): self
    {
        $this->setAttribute('service_account_name', $serviceAccountName);
        return $this;
    }

    public function getDnsName(): string
    {
        return $this->getAttribute('dns_name');
    }

    public function setDnsName(?string $dnsName = null): self
    {
        $this->setAttribute('dns_name', $dnsName);
        return $this;
    }

    public function getAddressFamily(): IPAddressFamilyEnum
    {
        return $this->getAttribute('address_family');
    }

    public function setAddressFamily(?IPAddressFamilyEnum $addressFamily = null): self
    {
        $this->setAttribute('address_family', $addressFamily);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            serviceAccountName: Arr::get($data, 'service_account_name'),
            dnsName: Arr::get($data, 'dns_name'),
            addressFamily: IPAddressFamilyEnum::tryFrom(Arr::get($data, 'address_family')),
        ));
    }
}
