<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Enums\StandardsScanDnssecStatusEnum;
use Cyberfusion\CoreApi\Enums\StandardsScanVerdictEnum;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class StandardsScanDns extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function __construct(
        StandardsScanDnssecStatusEnum $dnssecStatus,
        bool $caaEnabled,
        StandardsScanVerdictEnum $verdict,
    ) {
        $this->setDnssecStatus($dnssecStatus);
        $this->setCaaEnabled($caaEnabled);
        $this->setVerdict($verdict);
    }

    public function getDnssecStatus(): StandardsScanDnssecStatusEnum
    {
        return $this->getAttribute('dnssec_status');
    }

    public function setDnssecStatus(StandardsScanDnssecStatusEnum $dnssecStatus): self
    {
        $this->setAttribute('dnssec_status', $dnssecStatus);
        return $this;
    }

    public function getCaaEnabled(): bool
    {
        return $this->getAttribute('caa_enabled');
    }

    public function setCaaEnabled(bool $caaEnabled): self
    {
        $this->setAttribute('caa_enabled', $caaEnabled);
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
            dnssecStatus: StandardsScanDnssecStatusEnum::tryFrom(Arr::get($data, 'dnssec_status')),
            caaEnabled: Arr::get($data, 'caa_enabled'),
            verdict: StandardsScanVerdictEnum::tryFrom(Arr::get($data, 'verdict')),
        ));
    }
}
