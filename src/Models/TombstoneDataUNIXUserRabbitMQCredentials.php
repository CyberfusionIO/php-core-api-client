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
        return $this->getAttribute('dataType');
    }

    public function setDataType(string $dataType): self
    {
        $this->setAttribute('dataType', $dataType);
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

    public static function fromArray(array $data): self
    {
        return (new self(
            rabbitmqVirtualHostName: Arr::get($data, 'rabbitmq_virtual_host_name'),
        ))
            ->setDataType(Arr::get($data, 'data_type'));
    }
}
