<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class TombstoneDataUNIXUserRabbitMQCredentials extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(string $rabbitmqVirtualHostName)
    {
        $this->setRabbitmqVirtualHostName($rabbitmqVirtualHostName);
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

    public static function fromArray(array $data): self
    {
        return (new self(
            rabbitmqVirtualHostName: Arr::get($data, 'rabbitmq_virtual_host_name'),
        ))
            ->setDataType(Arr::get($data, 'data_type'));
    }
}
