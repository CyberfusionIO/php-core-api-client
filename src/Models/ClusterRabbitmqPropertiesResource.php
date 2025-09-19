<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class ClusterRabbitmqPropertiesResource extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(
        int $id,
        string $createdAt,
        string $updatedAt,
        string $rabbitmqErlangCookie,
        string $rabbitmqAdminPassword,
        string $rabbitmqManagementDomain,
        int $clusterId,
    ) {
        $this->setId($id);
        $this->setCreatedAt($createdAt);
        $this->setUpdatedAt($updatedAt);
        $this->setRabbitmqErlangCookie($rabbitmqErlangCookie);
        $this->setRabbitmqAdminPassword($rabbitmqAdminPassword);
        $this->setRabbitmqManagementDomain($rabbitmqManagementDomain);
        $this->setClusterId($clusterId);
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

    public function getRabbitmqErlangCookie(): string
    {
        return $this->getAttribute('rabbitmq_erlang_cookie');
    }

    /**
     * @throws ValidationException
     */
    public function setRabbitmqErlangCookie(?string $rabbitmqErlangCookie = null): self
    {
        Validator::create()
            ->length(min: 20, max: 20)
            ->regex('/^[A-Z0-9]+$/')
            ->assert($rabbitmqErlangCookie);
        $this->setAttribute('rabbitmq_erlang_cookie', $rabbitmqErlangCookie);
        return $this;
    }

    public function getRabbitmqAdminPassword(): string
    {
        return $this->getAttribute('rabbitmq_admin_password');
    }

    /**
     * @throws ValidationException
     */
    public function setRabbitmqAdminPassword(?string $rabbitmqAdminPassword = null): self
    {
        Validator::create()
            ->length(min: 24, max: 255)
            ->regex('/^[a-zA-Z0-9]+$/')
            ->assert($rabbitmqAdminPassword);
        $this->setAttribute('rabbitmq_admin_password', $rabbitmqAdminPassword);
        return $this;
    }

    public function getRabbitmqManagementDomain(): string
    {
        return $this->getAttribute('rabbitmq_management_domain');
    }

    public function setRabbitmqManagementDomain(?string $rabbitmqManagementDomain = null): self
    {
        $this->setAttribute('rabbitmq_management_domain', $rabbitmqManagementDomain);
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

    public function getIncludes(): ClusterRabbitmqPropertiesIncludes|null
    {
        return $this->getAttribute('includes');
    }

    public function setIncludes(?ClusterRabbitmqPropertiesIncludes $includes): self
    {
        $this->setAttribute('includes', $includes);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            id: Arr::get($data, 'id'),
            createdAt: Arr::get($data, 'created_at'),
            updatedAt: Arr::get($data, 'updated_at'),
            rabbitmqErlangCookie: Arr::get($data, 'rabbitmq_erlang_cookie'),
            rabbitmqAdminPassword: Arr::get($data, 'rabbitmq_admin_password'),
            rabbitmqManagementDomain: Arr::get($data, 'rabbitmq_management_domain'),
            clusterId: Arr::get($data, 'cluster_id'),
        ))
            ->setIncludes(Arr::get($data, 'includes') !== null ? ClusterRabbitmqPropertiesIncludes::fromArray(Arr::get($data, 'includes')) : null);
    }
}
