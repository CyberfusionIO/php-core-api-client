<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class UNIXUserRabbitMQCredentialsDatabase extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(
        int $id,
        string $createdAt,
        string $updatedAt,
        string $rabbitmqHost,
        bool $rabbitmqSslEnabled,
        int $rabbitmqAmqpPort,
        int $rabbitmqManagementPort,
        string $rabbitmqPassword,
        string $rabbitmqEncryptionKey,
        string $rabbitmqUsername,
        string $rabbitmqVirtualHostName,
        int $unixUserId,
        int $clusterId,
        ClusterDatabase $cluster,
        UNIXUserDatabase $unixUser,
    ) {
        $this->setId($id);
        $this->setCreatedAt($createdAt);
        $this->setUpdatedAt($updatedAt);
        $this->setRabbitmqHost($rabbitmqHost);
        $this->setRabbitmqSslEnabled($rabbitmqSslEnabled);
        $this->setRabbitmqAmqpPort($rabbitmqAmqpPort);
        $this->setRabbitmqManagementPort($rabbitmqManagementPort);
        $this->setRabbitmqPassword($rabbitmqPassword);
        $this->setRabbitmqEncryptionKey($rabbitmqEncryptionKey);
        $this->setRabbitmqUsername($rabbitmqUsername);
        $this->setRabbitmqVirtualHostName($rabbitmqVirtualHostName);
        $this->setUnixUserId($unixUserId);
        $this->setClusterId($clusterId);
        $this->setCluster($cluster);
        $this->setUnixUser($unixUser);
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

    public function getRabbitmqHost(): string
    {
        return $this->getAttribute('rabbitmq_host');
    }

    public function setRabbitmqHost(?string $rabbitmqHost = null): self
    {
        $this->setAttribute('rabbitmq_host', $rabbitmqHost);
        return $this;
    }

    public function getRabbitmqSslEnabled(): bool
    {
        return $this->getAttribute('rabbitmq_ssl_enabled');
    }

    public function setRabbitmqSslEnabled(?bool $rabbitmqSslEnabled = null): self
    {
        $this->setAttribute('rabbitmq_ssl_enabled', $rabbitmqSslEnabled);
        return $this;
    }

    public function getRabbitmqAmqpPort(): int
    {
        return $this->getAttribute('rabbitmq_amqp_port');
    }

    public function setRabbitmqAmqpPort(?int $rabbitmqAmqpPort = null): self
    {
        $this->setAttribute('rabbitmq_amqp_port', $rabbitmqAmqpPort);
        return $this;
    }

    public function getRabbitmqManagementPort(): int
    {
        return $this->getAttribute('rabbitmq_management_port');
    }

    public function setRabbitmqManagementPort(?int $rabbitmqManagementPort = null): self
    {
        $this->setAttribute('rabbitmq_management_port', $rabbitmqManagementPort);
        return $this;
    }

    public function getRabbitmqPassword(): string
    {
        return $this->getAttribute('rabbitmq_password');
    }

    /**
     * @throws ValidationException
     */
    public function setRabbitmqPassword(?string $rabbitmqPassword = null): self
    {
        Validator::create()
            ->length(min: 24, max: 255)
            ->regex('/^[a-zA-Z0-9]+$/')
            ->assert($rabbitmqPassword);
        $this->setAttribute('rabbitmq_password', $rabbitmqPassword);
        return $this;
    }

    public function getRabbitmqEncryptionKey(): string
    {
        return $this->getAttribute('rabbitmq_encryption_key');
    }

    /**
     * @throws ValidationException
     */
    public function setRabbitmqEncryptionKey(?string $rabbitmqEncryptionKey = null): self
    {
        Validator::create()
            ->length(min: 44, max: 44)
            ->regex('/^[a-z\=\_\-A-Z0-9]+$/')
            ->assert($rabbitmqEncryptionKey);
        $this->setAttribute('rabbitmq_encryption_key', $rabbitmqEncryptionKey);
        return $this;
    }

    public function getRabbitmqUsername(): string
    {
        return $this->getAttribute('rabbitmq_username');
    }

    /**
     * @throws ValidationException
     */
    public function setRabbitmqUsername(?string $rabbitmqUsername = null): self
    {
        Validator::create()
            ->length(min: 1, max: 32)
            ->regex('/^[a-z0-9-.]+$/')
            ->assert($rabbitmqUsername);
        $this->setAttribute('rabbitmq_username', $rabbitmqUsername);
        return $this;
    }

    public function getRabbitmqVirtualHostName(): string
    {
        return $this->getAttribute('rabbitmq_virtual_host_name');
    }

    /**
     * @throws ValidationException
     */
    public function setRabbitmqVirtualHostName(?string $rabbitmqVirtualHostName = null): self
    {
        Validator::create()
            ->length(min: 1, max: 32)
            ->regex('/^[a-z0-9-.]+$/')
            ->assert($rabbitmqVirtualHostName);
        $this->setAttribute('rabbitmq_virtual_host_name', $rabbitmqVirtualHostName);
        return $this;
    }

    public function getUnixUserId(): int
    {
        return $this->getAttribute('unix_user_id');
    }

    public function setUnixUserId(?int $unixUserId = null): self
    {
        $this->setAttribute('unix_user_id', $unixUserId);
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

    public function getCluster(): ClusterDatabase
    {
        return $this->getAttribute('cluster');
    }

    public function setCluster(?ClusterDatabase $cluster = null): self
    {
        $this->setAttribute('cluster', $cluster);
        return $this;
    }

    public function getUnixUser(): UNIXUserDatabase
    {
        return $this->getAttribute('unix_user');
    }

    public function setUnixUser(?UNIXUserDatabase $unixUser = null): self
    {
        $this->setAttribute('unix_user', $unixUser);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            id: Arr::get($data, 'id'),
            createdAt: Arr::get($data, 'created_at'),
            updatedAt: Arr::get($data, 'updated_at'),
            rabbitmqHost: Arr::get($data, 'rabbitmq_host'),
            rabbitmqSslEnabled: Arr::get($data, 'rabbitmq_ssl_enabled'),
            rabbitmqAmqpPort: Arr::get($data, 'rabbitmq_amqp_port'),
            rabbitmqManagementPort: Arr::get($data, 'rabbitmq_management_port'),
            rabbitmqPassword: Arr::get($data, 'rabbitmq_password'),
            rabbitmqEncryptionKey: Arr::get($data, 'rabbitmq_encryption_key'),
            rabbitmqUsername: Arr::get($data, 'rabbitmq_username'),
            rabbitmqVirtualHostName: Arr::get($data, 'rabbitmq_virtual_host_name'),
            unixUserId: Arr::get($data, 'unix_user_id'),
            clusterId: Arr::get($data, 'cluster_id'),
            cluster: ClusterDatabase::fromArray(Arr::get($data, 'cluster')),
            unixUser: UNIXUserDatabase::fromArray(Arr::get($data, 'unix_user')),
        ));
    }
}
