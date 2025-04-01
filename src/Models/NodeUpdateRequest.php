<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Cyberfusion\CoreApi\Support\ValidationHelper;
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

    public function setComment(?string $comment): self
    {
        $this->setAttribute('comment', $comment);
        return $this;
    }

    public function getLoadBalancerHealthChecksGroupsPairs(): string
    {
        return $this->getAttribute('loadBalancerHealthChecksGroupsPairs');
    }

    public function setLoadBalancerHealthChecksGroupsPairs(string $loadBalancerHealthChecksGroupsPairs): self
    {
        $this->setAttribute('loadBalancerHealthChecksGroupsPairs', $loadBalancerHealthChecksGroupsPairs);
        return $this;
    }

    public function getGroupsProperties(): NodeGroupsProperties
    {
        return $this->getAttribute('groupsProperties');
    }

    public function setGroupsProperties(NodeGroupsProperties $groupsProperties): self
    {
        $this->setAttribute('groupsProperties', $groupsProperties);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
        ))
            ->setGroups(Arr::get($data, 'groups'))
            ->setComment(Arr::get($data, 'comment'))
            ->setLoadBalancerHealthChecksGroupsPairs(Arr::get($data, 'load_balancer_health_checks_groups_pairs'))
            ->setGroupsProperties(Arr::get($data, 'groups_properties'));
    }
}
