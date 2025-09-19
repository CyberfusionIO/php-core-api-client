<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class TombstoneDataUNIXUserRabbitMQCredentials extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(
        int $id,
        string $rabbitmqVirtualHostName,
        TombstoneDataUNIXUserRabbitMQCredentialsIncludes $includes,
    ) {
        $this->setId($id);
        $this->setRabbitmqVirtualHostName($rabbitmqVirtualHostName);
        $this->setIncludes($includes);
    }

    public function getDataType(): string
    {
        return $this->getAttribute('data_type');
    }

    public function setDataType(string $dataType): self
    {
        $this->setAttribute('data_type', $dataType);
        return $this;
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

    public function getIncludes(): TombstoneDataUNIXUserRabbitMQCredentialsIncludes
    {
        return $this->getAttribute('includes');
    }

    public function setIncludes(?TombstoneDataUNIXUserRabbitMQCredentialsIncludes $includes = null): self
    {
        $this->setAttribute('includes', $includes);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            id: Arr::get($data, 'id'),
            rabbitmqVirtualHostName: Arr::get($data, 'rabbitmq_virtual_host_name'),
            includes: TombstoneDataUNIXUserRabbitMQCredentialsIncludes::fromArray(Arr::get($data, 'includes')),
        ))
            ->setDataType(Arr::get($data, 'data_type', 'unix_user_rabbitmq_credentials'));
    }
}
