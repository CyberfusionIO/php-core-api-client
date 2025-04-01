<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Cyberfusion\CoreApi\Support\ValidationHelper;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

/**
 * Properties.
 */
class NodeDatabase extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(
        int $id,
        string $createdAt,
        string $updatedAt,
        string $hostname,
        string $product,
        int $clusterId,
        string $loadBalancerHealthChecksGroupsPairs,
        NodeGroupsProperties $groupsProperties,
        bool $isReady,
        ?array $groups = null,
        ?string $comment = null,
        ?int $netboxId = null,
    ) {
        $this->setId($id);
        $this->setCreatedAt($createdAt);
        $this->setUpdatedAt($updatedAt);
        $this->setHostname($hostname);
        $this->setProduct($product);
        $this->setClusterId($clusterId);
        $this->setLoadBalancerHealthChecksGroupsPairs($loadBalancerHealthChecksGroupsPairs);
        $this->setGroupsProperties($groupsProperties);
        $this->setIsReady($isReady);
        $this->setGroups($groups);
        $this->setComment($comment);
        $this->setNetboxId($netboxId);
    }

    public function getId(): int
    {
        return $this->getAttribute('id');
    }

    public function setId(?int $id = null): self
    {
        $this->setAttribute('id', $id);
        return $this;
    }

    public function getCreatedAt(): string
    {
        return $this->getAttribute('createdAt');
    }

    public function setCreatedAt(?string $createdAt = null): self
    {
        $this->setAttribute('createdAt', $createdAt);
        return $this;
    }

    public function getUpdatedAt(): string
    {
        return $this->getAttribute('updatedAt');
    }

    public function setUpdatedAt(?string $updatedAt = null): self
    {
        $this->setAttribute('updatedAt', $updatedAt);
        return $this;
    }

    public function getHostname(): string
    {
        return $this->getAttribute('hostname');
    }

    public function setHostname(?string $hostname = null): self
    {
        $this->setAttribute('hostname', $hostname);
        return $this;
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
        $this->setAttribute('clusterId', $clusterId);
        return $this;
    }

    public function getGroups(): array|null
    {
        return $this->getAttribute('groups');
    }

    /**
     * @throws ValidationException
     */
    public function setGroups(?array $groups = []): self
    {
        Validator::create()
            ->unique()
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
        $this->setAttribute('loadBalancerHealthChecksGroupsPairs', $loadBalancerHealthChecksGroupsPairs);
        return $this;
    }

    public function getGroupsProperties(): NodeGroupsProperties
    {
        return $this->getAttribute('groupsProperties');
    }

    public function setGroupsProperties(?NodeGroupsProperties $groupsProperties = null): self
    {
        $this->setAttribute('groupsProperties', $groupsProperties);
        return $this;
    }

    public function getIsReady(): bool
    {
        return $this->getAttribute('isReady');
    }

    public function setIsReady(?bool $isReady = null): self
    {
        $this->setAttribute('isReady', $isReady);
        return $this;
    }

    public function getNetboxId(): int|null
    {
        return $this->getAttribute('netboxId');
    }

    public function setNetboxId(?int $netboxId = null): self
    {
        $this->setAttribute('netboxId', $netboxId);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            id: Arr::get($data, 'id'),
            createdAt: Arr::get($data, 'created_at'),
            updatedAt: Arr::get($data, 'updated_at'),
            hostname: Arr::get($data, 'hostname'),
            product: Arr::get($data, 'product'),
            clusterId: Arr::get($data, 'cluster_id'),
            loadBalancerHealthChecksGroupsPairs: Arr::get($data, 'load_balancer_health_checks_groups_pairs'),
            groupsProperties: NodeGroupsProperties::fromArray(Arr::get($data, 'groups_properties')),
            isReady: Arr::get($data, 'is_ready'),
            groups: Arr::get($data, 'groups'),
            comment: Arr::get($data, 'comment'),
            netboxId: Arr::get($data, 'netbox_id'),
        ));
    }
}
