<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class NodeCronDependency extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(bool $isDependency, string $reason, CronResource $cron, ?string $impact = null)
    {
        $this->setIsDependency($isDependency);
        $this->setReason($reason);
        $this->setCron($cron);
        $this->setImpact($impact);
    }

    public function getIsDependency(): bool
    {
        return $this->getAttribute('is_dependency');
    }

    public function setIsDependency(?bool $isDependency = null): self
    {
        $this->setAttribute('is_dependency', $isDependency);
        return $this;
    }

    public function getImpact(): string|null
    {
        return $this->getAttribute('impact');
    }

    public function setImpact(?string $impact = null): self
    {
        $this->setAttribute('impact', $impact);
        return $this;
    }

    public function getReason(): string
    {
        return $this->getAttribute('reason');
    }

    public function setReason(?string $reason = null): self
    {
        $this->setAttribute('reason', $reason);
        return $this;
    }

    public function getCron(): CronResource
    {
        return $this->getAttribute('cron');
    }

    public function setCron(?CronResource $cron = null): self
    {
        $this->setAttribute('cron', $cron);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            isDependency: Arr::get($data, 'is_dependency'),
            reason: Arr::get($data, 'reason'),
            cron: CronResource::fromArray(Arr::get($data, 'cron')),
            impact: Arr::get($data, 'impact'),
        ));
    }
}
