<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class NodeDomainRouterDependency extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function __construct(
        bool $isDependency,
        string $reason,
        DomainRouterResource $domainRouter,
        ?string $impact = null,
    ) {
        $this->setIsDependency($isDependency);
        $this->setReason($reason);
        $this->setDomainRouter($domainRouter);
        $this->setImpact($impact);
    }

    public function getIsDependency(): bool
    {
        return $this->getAttribute('is_dependency');
    }

    public function setIsDependency(bool $isDependency): self
    {
        $this->setAttribute('is_dependency', $isDependency);
        return $this;
    }

    public function getImpact(): string|null
    {
        return $this->getAttribute('impact');
    }

    public function setImpact(?string $impact): self
    {
        $this->setAttribute('impact', $impact);
        return $this;
    }

    public function getReason(): string
    {
        return $this->getAttribute('reason');
    }

    public function setReason(string $reason): self
    {
        $this->setAttribute('reason', $reason);
        return $this;
    }

    public function getDomainRouter(): DomainRouterResource
    {
        return $this->getAttribute('domain_router');
    }

    public function setDomainRouter(DomainRouterResource $domainRouter): self
    {
        $this->setAttribute('domain_router', $domainRouter);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            isDependency: Arr::get($data, 'is_dependency'),
            reason: Arr::get($data, 'reason'),
            domainRouter: DomainRouterResource::fromArray(Arr::get($data, 'domain_router')),
            impact: Arr::get($data, 'impact'),
        ));
    }
}
