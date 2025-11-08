<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class NodeUpdateRequest extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

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
            ->when(Arr::has($data, 'comment'), fn (self $model) => $model->setComment(Arr::get($data, 'comment')))
            ->when(Arr::has($data, 'load_balancer_health_checks_groups_pairs'), fn (self $model) => $model->setLoadBalancerHealthChecksGroupsPairs(Arr::get($data, 'load_balancer_health_checks_groups_pairs')));
    }
}
