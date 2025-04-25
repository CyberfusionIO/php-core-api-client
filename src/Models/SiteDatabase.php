<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class SiteDatabase extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(
        int $id,
        string $createdAt,
        string $updatedAt,
        string $name,
        int $netboxSiteGroupId,
        int $netboxAdminPrefixIpv4Id,
        int $netboxAdminPrefixIpv6Id,
        int $netboxCustomerPrefixContainerIpv4Id,
        int $netboxCustomerPrefixContainerIpv6Id,
        int $netboxVlanGroupId,
        int $netboxDefaultVmClusterId,
        int $netboxBorgServerVmClusterId,
    ) {
        $this->setId($id);
        $this->setCreatedAt($createdAt);
        $this->setUpdatedAt($updatedAt);
        $this->setName($name);
        $this->setNetboxSiteGroupId($netboxSiteGroupId);
        $this->setNetboxAdminPrefixIpv4Id($netboxAdminPrefixIpv4Id);
        $this->setNetboxAdminPrefixIpv6Id($netboxAdminPrefixIpv6Id);
        $this->setNetboxCustomerPrefixContainerIpv4Id($netboxCustomerPrefixContainerIpv4Id);
        $this->setNetboxCustomerPrefixContainerIpv6Id($netboxCustomerPrefixContainerIpv6Id);
        $this->setNetboxVlanGroupId($netboxVlanGroupId);
        $this->setNetboxDefaultVmClusterId($netboxDefaultVmClusterId);
        $this->setNetboxBorgServerVmClusterId($netboxBorgServerVmClusterId);
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

    public function getName(): string
    {
        return $this->getAttribute('name');
    }

    /**
     * @throws ValidationException
     */
    public function setName(?string $name = null): self
    {
        Validator::create()
            ->length(min: 1, max: 32)
            ->regex('/^[A-Z0-9-]+$/')
            ->assert($name);
        $this->setAttribute('name', $name);
        return $this;
    }

    public function getNetboxSiteGroupId(): int
    {
        return $this->getAttribute('netbox_site_group_id');
    }

    public function setNetboxSiteGroupId(?int $netboxSiteGroupId = null): self
    {
        $this->setAttribute('netbox_site_group_id', $netboxSiteGroupId);
        return $this;
    }

    public function getNetboxAdminPrefixIpv4Id(): int
    {
        return $this->getAttribute('netbox_admin_prefix_ipv4_id');
    }

    public function setNetboxAdminPrefixIpv4Id(?int $netboxAdminPrefixIpv4Id = null): self
    {
        $this->setAttribute('netbox_admin_prefix_ipv4_id', $netboxAdminPrefixIpv4Id);
        return $this;
    }

    public function getNetboxAdminPrefixIpv6Id(): int
    {
        return $this->getAttribute('netbox_admin_prefix_ipv6_id');
    }

    public function setNetboxAdminPrefixIpv6Id(?int $netboxAdminPrefixIpv6Id = null): self
    {
        $this->setAttribute('netbox_admin_prefix_ipv6_id', $netboxAdminPrefixIpv6Id);
        return $this;
    }

    public function getNetboxCustomerPrefixContainerIpv4Id(): int
    {
        return $this->getAttribute('netbox_customer_prefix_container_ipv4_id');
    }

    public function setNetboxCustomerPrefixContainerIpv4Id(?int $netboxCustomerPrefixContainerIpv4Id = null): self
    {
        $this->setAttribute('netbox_customer_prefix_container_ipv4_id', $netboxCustomerPrefixContainerIpv4Id);
        return $this;
    }

    public function getNetboxCustomerPrefixContainerIpv6Id(): int
    {
        return $this->getAttribute('netbox_customer_prefix_container_ipv6_id');
    }

    public function setNetboxCustomerPrefixContainerIpv6Id(?int $netboxCustomerPrefixContainerIpv6Id = null): self
    {
        $this->setAttribute('netbox_customer_prefix_container_ipv6_id', $netboxCustomerPrefixContainerIpv6Id);
        return $this;
    }

    public function getNetboxVlanGroupId(): int
    {
        return $this->getAttribute('netbox_vlan_group_id');
    }

    public function setNetboxVlanGroupId(?int $netboxVlanGroupId = null): self
    {
        $this->setAttribute('netbox_vlan_group_id', $netboxVlanGroupId);
        return $this;
    }

    public function getNetboxDefaultVmClusterId(): int
    {
        return $this->getAttribute('netbox_default_vm_cluster_id');
    }

    public function setNetboxDefaultVmClusterId(?int $netboxDefaultVmClusterId = null): self
    {
        $this->setAttribute('netbox_default_vm_cluster_id', $netboxDefaultVmClusterId);
        return $this;
    }

    public function getNetboxBorgServerVmClusterId(): int
    {
        return $this->getAttribute('netbox_borg_server_vm_cluster_id');
    }

    public function setNetboxBorgServerVmClusterId(?int $netboxBorgServerVmClusterId = null): self
    {
        $this->setAttribute('netbox_borg_server_vm_cluster_id', $netboxBorgServerVmClusterId);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            id: Arr::get($data, 'id'),
            createdAt: Arr::get($data, 'created_at'),
            updatedAt: Arr::get($data, 'updated_at'),
            name: Arr::get($data, 'name'),
            netboxSiteGroupId: Arr::get($data, 'netbox_site_group_id'),
            netboxAdminPrefixIpv4Id: Arr::get($data, 'netbox_admin_prefix_ipv4_id'),
            netboxAdminPrefixIpv6Id: Arr::get($data, 'netbox_admin_prefix_ipv6_id'),
            netboxCustomerPrefixContainerIpv4Id: Arr::get($data, 'netbox_customer_prefix_container_ipv4_id'),
            netboxCustomerPrefixContainerIpv6Id: Arr::get($data, 'netbox_customer_prefix_container_ipv6_id'),
            netboxVlanGroupId: Arr::get($data, 'netbox_vlan_group_id'),
            netboxDefaultVmClusterId: Arr::get($data, 'netbox_default_vm_cluster_id'),
            netboxBorgServerVmClusterId: Arr::get($data, 'netbox_borg_server_vm_cluster_id'),
        ));
    }
}
