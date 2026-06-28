<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Enums\StandardsScanDomainCheckStatusEnum;
use Cyberfusion\CoreApi\Enums\StandardsScanVerdictEnum;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class StandardsScanDomainResult extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function __construct(
        string $domain,
        StandardsScanDomainCheckStatusEnum $checkStatus,
        StandardsScanVerdictEnum $verdict,
        StandardsScanScores $scores,
        StandardsScanReachability $reachability,
        StandardsScanDns $dns,
        StandardsScanHttps $https,
        StandardsScanSecurityTxt $securityTxt,
        StandardsScanSecurityHeaders $securityHeaders,
    ) {
        $this->setDomain($domain);
        $this->setCheckStatus($checkStatus);
        $this->setVerdict($verdict);
        $this->setScores($scores);
        $this->setReachability($reachability);
        $this->setDns($dns);
        $this->setHttps($https);
        $this->setSecurityTxt($securityTxt);
        $this->setSecurityHeaders($securityHeaders);
    }

    public function getDomain(): string
    {
        return $this->getAttribute('domain');
    }

    public function setDomain(string $domain): self
    {
        $this->setAttribute('domain', $domain);
        return $this;
    }

    public function getCheckStatus(): StandardsScanDomainCheckStatusEnum
    {
        return $this->getAttribute('check_status');
    }

    public function setCheckStatus(StandardsScanDomainCheckStatusEnum $checkStatus): self
    {
        $this->setAttribute('check_status', $checkStatus);
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

    public function getScores(): StandardsScanScores
    {
        return $this->getAttribute('scores');
    }

    public function setScores(StandardsScanScores $scores): self
    {
        $this->setAttribute('scores', $scores);
        return $this;
    }

    public function getReachability(): StandardsScanReachability
    {
        return $this->getAttribute('reachability');
    }

    public function setReachability(StandardsScanReachability $reachability): self
    {
        $this->setAttribute('reachability', $reachability);
        return $this;
    }

    public function getDns(): StandardsScanDns
    {
        return $this->getAttribute('dns');
    }

    public function setDns(StandardsScanDns $dns): self
    {
        $this->setAttribute('dns', $dns);
        return $this;
    }

    public function getHttps(): StandardsScanHttps
    {
        return $this->getAttribute('https');
    }

    public function setHttps(StandardsScanHttps $https): self
    {
        $this->setAttribute('https', $https);
        return $this;
    }

    public function getSecurityTxt(): StandardsScanSecurityTxt
    {
        return $this->getAttribute('security_txt');
    }

    public function setSecurityTxt(StandardsScanSecurityTxt $securityTxt): self
    {
        $this->setAttribute('security_txt', $securityTxt);
        return $this;
    }

    public function getSecurityHeaders(): StandardsScanSecurityHeaders
    {
        return $this->getAttribute('security_headers');
    }

    public function setSecurityHeaders(StandardsScanSecurityHeaders $securityHeaders): self
    {
        $this->setAttribute('security_headers', $securityHeaders);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            domain: Arr::get($data, 'domain'),
            checkStatus: StandardsScanDomainCheckStatusEnum::tryFrom(Arr::get($data, 'check_status')),
            verdict: StandardsScanVerdictEnum::tryFrom(Arr::get($data, 'verdict')),
            scores: StandardsScanScores::fromArray(Arr::get($data, 'scores')),
            reachability: StandardsScanReachability::fromArray(Arr::get($data, 'reachability')),
            dns: StandardsScanDns::fromArray(Arr::get($data, 'dns')),
            https: StandardsScanHttps::fromArray(Arr::get($data, 'https')),
            securityTxt: StandardsScanSecurityTxt::fromArray(Arr::get($data, 'security_txt')),
            securityHeaders: StandardsScanSecurityHeaders::fromArray(Arr::get($data, 'security_headers')),
        ));
    }
}
