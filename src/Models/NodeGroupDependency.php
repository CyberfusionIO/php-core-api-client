<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Enums\NodeGroupEnum;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class NodeGroupDependency extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(bool $isDependency, string $reason, NodeGroupEnum $group, ?string $impact = null)
    {
        $this->setIsDependency($isDependency);
        $this->setReason($reason);
        $this->setGroup($group);
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

    public function getGroup(): NodeGroupEnum
    {
        return $this->getAttribute('group');
    }

    public function setGroup(?NodeGroupEnum $group = null): self
    {
        $this->setAttribute('group', $group);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            isDependency: Arr::get($data, 'is_dependency'),
            reason: Arr::get($data, 'reason'),
            group: NodeGroupEnum::tryFrom(Arr::get($data, 'group')),
            impact: Arr::get($data, 'impact'),
        ));
    }
}
