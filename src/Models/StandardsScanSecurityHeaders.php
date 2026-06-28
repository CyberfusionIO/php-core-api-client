<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Enums\StandardsScanVerdictEnum;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class StandardsScanSecurityHeaders extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function __construct(
        bool $xFrameOptionsEnabled,
        bool $xContentTypeOptionsEnabled,
        bool $contentSecurityPolicyEnabled,
        bool $referrerPolicyEnabled,
        StandardsScanVerdictEnum $verdict,
    ) {
        $this->setXFrameOptionsEnabled($xFrameOptionsEnabled);
        $this->setXContentTypeOptionsEnabled($xContentTypeOptionsEnabled);
        $this->setContentSecurityPolicyEnabled($contentSecurityPolicyEnabled);
        $this->setReferrerPolicyEnabled($referrerPolicyEnabled);
        $this->setVerdict($verdict);
    }

    public function getXFrameOptionsEnabled(): bool
    {
        return $this->getAttribute('x_frame_options_enabled');
    }

    public function setXFrameOptionsEnabled(bool $xFrameOptionsEnabled): self
    {
        $this->setAttribute('x_frame_options_enabled', $xFrameOptionsEnabled);
        return $this;
    }

    public function getXContentTypeOptionsEnabled(): bool
    {
        return $this->getAttribute('x_content_type_options_enabled');
    }

    public function setXContentTypeOptionsEnabled(bool $xContentTypeOptionsEnabled): self
    {
        $this->setAttribute('x_content_type_options_enabled', $xContentTypeOptionsEnabled);
        return $this;
    }

    public function getContentSecurityPolicyEnabled(): bool
    {
        return $this->getAttribute('content_security_policy_enabled');
    }

    public function setContentSecurityPolicyEnabled(bool $contentSecurityPolicyEnabled): self
    {
        $this->setAttribute('content_security_policy_enabled', $contentSecurityPolicyEnabled);
        return $this;
    }

    public function getReferrerPolicyEnabled(): bool
    {
        return $this->getAttribute('referrer_policy_enabled');
    }

    public function setReferrerPolicyEnabled(bool $referrerPolicyEnabled): self
    {
        $this->setAttribute('referrer_policy_enabled', $referrerPolicyEnabled);
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
            xFrameOptionsEnabled: Arr::get($data, 'x_frame_options_enabled'),
            xContentTypeOptionsEnabled: Arr::get($data, 'x_content_type_options_enabled'),
            contentSecurityPolicyEnabled: Arr::get($data, 'content_security_policy_enabled'),
            referrerPolicyEnabled: Arr::get($data, 'referrer_policy_enabled'),
            verdict: StandardsScanVerdictEnum::tryFrom(Arr::get($data, 'verdict')),
        ));
    }
}
