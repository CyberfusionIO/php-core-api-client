<?php

namespace Cyberfusion\CoreApi\Models;

use ArrayObject;
use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class NodeCreateRequest extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function __construct(
        string $product,
        int $clusterId,
        array $groups,
        ArrayObject $loadBalancerHealthChecksGroupsPairs,
    ) {
        $this->setProduct($product);
        $this->setClusterId($clusterId);
        $this->setGroups($groups);
        $this->setLoadBalancerHealthChecksGroupsPairs($loadBalancerHealthChecksGroupsPairs);
    }

    public function getProduct(): string
    {
        return $this->getAttribute('product');
    }

    /**
     * @throws ValidationException
     */
    public function setProduct(string $product): self
    {
        Validator::create()
            ->length(min: 1, max: 2)
            ->regex('/^[A-Z]+$/')
            ->assert($product);
        $this->setAttribute('product', $product);
        return $this;
    }

    public function getClusterId(): int
    {
        return $this->getAttribute('cluster_id');
    }

    public function setClusterId(int $clusterId): self
    {
        $this->setAttribute('cluster_id', $clusterId);
        return $this;
    }

    public function getGroups(): array
    {
        return $this->getAttribute('groups');
    }

    /**
     * @throws ValidationException
     */
    public function setGroups(array $groups): self
    {
        Validator::create()
            ->unique()
            ->assert($groups);
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

    public function getLoadBalancerHealthChecksGroupsPairs(): ArrayObject
    {
        return $this->getAttribute('load_balancer_health_checks_groups_pairs');
    }

    public function setLoadBalancerHealthChecksGroupsPairs(ArrayObject $loadBalancerHealthChecksGroupsPairs): self
    {
        $this->setAttribute('load_balancer_health_checks_groups_pairs', $loadBalancerHealthChecksGroupsPairs);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            product: Arr::get($data, 'product'),
            clusterId: Arr::get($data, 'cluster_id'),
            groups: Arr::get($data, 'groups'),
            loadBalancerHealthChecksGroupsPairs: new ArrayObject(Arr::get($data, 'load_balancer_health_checks_groups_pairs')),
        ))
            ->when(Arr::has($data, 'comment'), fn (self $model) => $model->setComment(Arr::get($data, 'comment')));
    }
}
