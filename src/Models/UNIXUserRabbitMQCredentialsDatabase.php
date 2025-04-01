<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

/**
 * Properties.
 */
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

    public function getRabbitmqHost(): string
    {
        return $this->getAttribute('rabbitmqHost');
    }

    public function setRabbitmqHost(?string $rabbitmqHost = null): self
    {
        $this->setAttribute('rabbitmqHost', $rabbitmqHost);
        return $this;
    }

    public function getRabbitmqSslEnabled(): bool
    {
        return $this->getAttribute('rabbitmqSslEnabled');
    }

    public function setRabbitmqSslEnabled(?bool $rabbitmqSslEnabled = null): self
    {
        $this->setAttribute('rabbitmqSslEnabled', $rabbitmqSslEnabled);
        return $this;
    }

    public function getRabbitmqAmqpPort(): int
    {
        return $this->getAttribute('rabbitmqAmqpPort');
    }

    public function setRabbitmqAmqpPort(?int $rabbitmqAmqpPort = null): self
    {
        $this->setAttribute('rabbitmqAmqpPort', $rabbitmqAmqpPort);
        return $this;
    }

    public function getRabbitmqManagementPort(): int
    {
        return $this->getAttribute('rabbitmqManagementPort');
    }

    public function setRabbitmqManagementPort(?int $rabbitmqManagementPort = null): self
    {
        $this->setAttribute('rabbitmqManagementPort', $rabbitmqManagementPort);
        return $this;
    }

    public function getRabbitmqPassword(): string
    {
        return $this->getAttribute('rabbitmqPassword');
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
        $this->setAttribute('rabbitmqPassword', $rabbitmqPassword);
        return $this;
    }

    public function getRabbitmqEncryptionKey(): string
    {
        return $this->getAttribute('rabbitmqEncryptionKey');
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
        $this->setAttribute('rabbitmqEncryptionKey', $rabbitmqEncryptionKey);
        return $this;
    }

    public function getRabbitmqUsername(): string
    {
        return $this->getAttribute('rabbitmqUsername');
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
        $this->setAttribute('rabbitmqUsername', $rabbitmqUsername);
        return $this;
    }

    public function getRabbitmqVirtualHostName(): string
    {
        return $this->getAttribute('rabbitmqVirtualHostName');
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
        $this->setAttribute('rabbitmqVirtualHostName', $rabbitmqVirtualHostName);
        return $this;
    }

    public function getUnixUserId(): int
    {
        return $this->getAttribute('unixUserId');
    }

    public function setUnixUserId(?int $unixUserId = null): self
    {
        $this->setAttribute('unixUserId', $unixUserId);
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
        ));
    }
}
