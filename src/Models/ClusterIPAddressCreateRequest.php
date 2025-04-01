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
        return $this->getAttribute('serviceAccountName');
    }

    public function setServiceAccountName(?string $serviceAccountName = null): self
    {
        $this->setAttribute('serviceAccountName', $serviceAccountName);
        return $this;
    }

    public function getDnsName(): string
    {
        return $this->getAttribute('dnsName');
    }

    public function setDnsName(?string $dnsName = null): self
    {
        $this->setAttribute('dnsName', $dnsName);
        return $this;
    }

    public function getAddressFamily(): IPAddressFamilyEnum
    {
        return $this->getAttribute('addressFamily');
    }

    public function setAddressFamily(?IPAddressFamilyEnum $addressFamily = null): self
    {
        $this->setAttribute('addressFamily', $addressFamily);
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
