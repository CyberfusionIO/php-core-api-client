<?php

namespace Cyberfusion\CoreApi\Models;

use ArrayObject;
use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Enums\StandardsScanVerdictEnum;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class StandardsScanReachability extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function __construct(
        ArrayObject $nameserverReachable,
        ArrayObject $websiteIpv4Reachable,
        ArrayObject $websiteIpv6Reachable,
        StandardsScanVerdictEnum $verdict,
    ) {
        $this->setNameserverReachable($nameserverReachable);
        $this->setWebsiteIpv4Reachable($websiteIpv4Reachable);
        $this->setWebsiteIpv6Reachable($websiteIpv6Reachable);
        $this->setVerdict($verdict);
    }

    public function getNameserverReachable(): ArrayObject
    {
        return $this->getAttribute('nameserver_reachable');
    }

    public function setNameserverReachable(ArrayObject $nameserverReachable): self
    {
        $this->setAttribute('nameserver_reachable', $nameserverReachable);
        return $this;
    }

    public function getWebsiteIpv4Reachable(): ArrayObject
    {
        return $this->getAttribute('website_ipv4_reachable');
    }

    public function setWebsiteIpv4Reachable(ArrayObject $websiteIpv4Reachable): self
    {
        $this->setAttribute('website_ipv4_reachable', $websiteIpv4Reachable);
        return $this;
    }

    public function getWebsiteIpv6Reachable(): ArrayObject
    {
        return $this->getAttribute('website_ipv6_reachable');
    }

    public function setWebsiteIpv6Reachable(ArrayObject $websiteIpv6Reachable): self
    {
        $this->setAttribute('website_ipv6_reachable', $websiteIpv6Reachable);
        return $this;
    }

    public function getVerdict(): StandardsScanVerdictEnum
    {
        return $this->getAttribute('verdict');
    }

    public function setVerdict(StandardsScanVerdictEnum $verdict): self
    {
        $this->setAttribute('verdict', $verdict);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            nameserverReachable: new ArrayObject(Arr::get($data, 'nameserver_reachable')),
            websiteIpv4Reachable: new ArrayObject(Arr::get($data, 'website_ipv4_reachable')),
            websiteIpv6Reachable: new ArrayObject(Arr::get($data, 'website_ipv6_reachable')),
            verdict: StandardsScanVerdictEnum::tryFrom(Arr::get($data, 'verdict')),
        ));
    }
}
