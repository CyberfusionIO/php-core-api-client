<?php

namespace Cyberfusion\CoreApi\Models;

use ArrayObject;
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
        array $groups,
        ArrayObject $loadBalancerHealthChecksGroupsPairs,
        NodeGroupsProperties $groupsProperties,
        bool $isReady,
        ?string $comment = null,
        ?int $netboxId = null,
    ) {
        $this->setId($id);
        $this->setCreatedAt($createdAt);
        $this->setUpdatedAt($updatedAt);
        $this->setHostname($hostname);
        $this->setProduct($product);
        $this->setClusterId($clusterId);
        $this->setGroups($groups);
        $this->setLoadBalancerHealthChecksGroupsPairs($loadBalancerHealthChecksGroupsPairs);
        $this->setGroupsProperties($groupsProperties);
        $this->setIsReady($isReady);
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
        return $this->getAttribute('created_at');
    }

    public function setCreatedAt(?string $createdAt = null): self
    {
        $this->setAttribute('created_at', $createdAt);
        return $this;
    }

    public function getUpdatedAt(): string
    {
        return $this->getAttribute('updated_at');
    }

    public function setUpdatedAt(?string $updatedAt = null): self
    {
        $this->setAttribute('updated_at', $updatedAt);
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
        return $this->getAttribute('cluster_id');
    }

    public function setClusterId(?int $clusterId = null): self
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
    public function setGroups(array $groups = []): self
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

    public function getLoadBalancerHealthChecksGroupsPairs(): ArrayObject
    {
        return $this->getAttribute('load_balancer_health_checks_groups_pairs');
    }

    public function setLoadBalancerHealthChecksGroupsPairs(
        ?ArrayObject $loadBalancerHealthChecksGroupsPairs = null,
    ): self {
        $this->setAttribute('load_balancer_health_checks_groups_pairs', $loadBalancerHealthChecksGroupsPairs);
        return $this;
    }

    public function getGroupsProperties(): NodeGroupsProperties
    {
        return $this->getAttribute('groups_properties');
    }

    public function setGroupsProperties(?NodeGroupsProperties $groupsProperties = null): self
    {
        $this->setAttribute('groups_properties', $groupsProperties);
        return $this;
    }

    public function getIsReady(): bool
    {
        return $this->getAttribute('is_ready');
    }

    public function setIsReady(?bool $isReady = null): self
    {
        $this->setAttribute('is_ready', $isReady);
        return $this;
    }

    public function getNetboxId(): int|null
    {
        return $this->getAttribute('netbox_id');
    }

    public function setNetboxId(?int $netboxId = null): self
    {
        $this->setAttribute('netbox_id', $netboxId);
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
            groups: Arr::get($data, 'groups'),
            loadBalancerHealthChecksGroupsPairs: new ArrayObject(Arr::get($data, 'load_balancer_health_checks_groups_pairs')),
            groupsProperties: NodeGroupsProperties::fromArray(Arr::get($data, 'groups_properties')),
            isReady: Arr::get($data, 'is_ready'),
            comment: Arr::get($data, 'comment'),
            netboxId: Arr::get($data, 'netbox_id'),
        ));
    }
}
