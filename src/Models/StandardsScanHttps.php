<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Enums\StandardsScanHttpsRedirectEnum;
use Cyberfusion\CoreApi\Enums\StandardsScanVerdictEnum;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class StandardsScanHttps extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function __construct(
        bool $ipv4Enabled,
        bool $ipv6Enabled,
        StandardsScanHttpsRedirectEnum $redirect,
        bool $hsts,
        StandardsScanVerdictEnum $verdict,
    ) {
        $this->setIpv4Enabled($ipv4Enabled);
        $this->setIpv6Enabled($ipv6Enabled);
        $this->setRedirect($redirect);
        $this->setHsts($hsts);
        $this->setVerdict($verdict);
    }

    public function getIpv4Enabled(): bool
    {
        return $this->getAttribute('ipv4_enabled');
    }

    public function setIpv4Enabled(bool $ipv4Enabled): self
    {
        $this->setAttribute('ipv4_enabled', $ipv4Enabled);
        return $this;
    }

    public function getIpv6Enabled(): bool
    {
        return $this->getAttribute('ipv6_enabled');
    }

    public function setIpv6Enabled(bool $ipv6Enabled): self
    {
        $this->setAttribute('ipv6_enabled', $ipv6Enabled);
        return $this;
    }

    public function getRedirect(): StandardsScanHttpsRedirectEnum
    {
        return $this->getAttribute('redirect');
    }

    public function setRedirect(StandardsScanHttpsRedirectEnum $redirect): self
    {
        $this->setAttribute('redirect', $redirect);
        return $this;
    }

    public function getHsts(): bool
    {
        return $this->getAttribute('hsts');
    }

    public function setHsts(bool $hsts): self
    {
        $this->setAttribute('hsts', $hsts);
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
            ipv4Enabled: Arr::get($data, 'ipv4_enabled'),
            ipv6Enabled: Arr::get($data, 'ipv6_enabled'),
            redirect: StandardsScanHttpsRedirectEnum::tryFrom(Arr::get($data, 'redirect')),
            hsts: Arr::get($data, 'hsts'),
            verdict: StandardsScanVerdictEnum::tryFrom(Arr::get($data, 'verdict')),
        ));
    }
}
