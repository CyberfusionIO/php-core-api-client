<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class NodeUpdateRequest extends CoreApiModel implements CoreApiModelContract
{
    public function __construct()
    {
    }

    public function getGroups(): array|null
    {
        return $this->getAttribute('groups');
    }

    public function setGroups(?array $groups): self
    {
        $this->setAttribute('groups', $groups);
        return $this;
    }

    public function getComment(): string|null
    {
        return $this->getAttribute('comment');
    }

    public function setComment(?string $comment): self
    {
        $this->setAttribute('comment', $comment);
        return $this;
    }

    public function getLoadBalancerHealthChecksGroupsPairs(): \ArrayObject|null
    {
        return $this->getAttribute('load_balancer_health_checks_groups_pairs');
    }

    public function setLoadBalancerHealthChecksGroupsPairs(?\ArrayObject $loadBalancerHealthChecksGroupsPairs): self
    {
        $this->setAttribute('load_balancer_health_checks_groups_pairs', $loadBalancerHealthChecksGroupsPairs);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
        ))
            ->setGroups(Arr::get($data, 'groups'))
            ->setComment(Arr::get($data, 'comment'))
            ->setLoadBalancerHealthChecksGroupsPairs(Arr::get($data, 'load_balancer_health_checks_groups_pairs'));
    }
}
