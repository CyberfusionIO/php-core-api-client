<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Cyberfusion\CoreApi\Support\ValidationHelper;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class NodeCreateRequest extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(
        string $product,
        int $clusterId,
        string $loadBalancerHealthChecksGroupsPairs,
        NodeGroupsProperties $groupsProperties,
        ?string $comment = null,
    ) {
        $this->setProduct($product);
        $this->setClusterId($clusterId);
        $this->setLoadBalancerHealthChecksGroupsPairs($loadBalancerHealthChecksGroupsPairs);
        $this->setGroupsProperties($groupsProperties);
        $this->setComment($comment);
    }

    public function getProduct(): string
    {
        return $this->getAttribute('product');
    }

    /**
     * @throws ValidationException
     */
    public function setProduct(?string $product = null): self
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
        return $this->getAttribute('clusterId');
    }

    public function setClusterId(?int $clusterId = null): self
    {
        $this->setAttribute('cluster_id', $clusterId);
        return $this;
    }

    public function getGroups(): array|null
    {
        return $this->getAttribute('groups');
    }

    /**
     * @throws ValidationException
     */
    public function setGroups(?array $groups): self
    {
        Validator::optional(Validator::create()
            ->unique())
            ->assert(ValidationHelper::prepareArray($groups));
        $this->setAttribute('groups', $groups);
        return $this;
    }

    public function getComment(): string|null
    {
        return $this->getAttribute('comment');
    }

    public function setComment(?string $comment = null): self
    {
        $this->setAttribute('comment', $comment);
        return $this;
    }

    public function getLoadBalancerHealthChecksGroupsPairs(): string
    {
        return $this->getAttribute('loadBalancerHealthChecksGroupsPairs');
    }

    public function setLoadBalancerHealthChecksGroupsPairs(?string $loadBalancerHealthChecksGroupsPairs = null): self
    {
        $this->setAttribute('load_balancer_health_checks_groups_pairs', $loadBalancerHealthChecksGroupsPairs);
        return $this;
    }

    public function getGroupsProperties(): NodeGroupsProperties
    {
        return $this->getAttribute('groupsProperties');
    }

    public function setGroupsProperties(?NodeGroupsProperties $groupsProperties = null): self
    {
        $this->setAttribute('groups_properties', $groupsProperties);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            product: Arr::get($data, 'product'),
            clusterId: Arr::get($data, 'cluster_id'),
            loadBalancerHealthChecksGroupsPairs: Arr::get($data, 'load_balancer_health_checks_groups_pairs'),
            groupsProperties: NodeGroupsProperties::fromArray(Arr::get($data, 'groups_properties')),
            comment: Arr::get($data, 'comment'),
        ))
            ->setGroups(Arr::get($data, 'groups'));
    }
}
