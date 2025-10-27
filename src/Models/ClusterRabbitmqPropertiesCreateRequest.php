<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class ClusterRabbitmqPropertiesCreateRequest extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function __construct(string $rabbitmqAdminPassword, string $rabbitmqManagementDomain)
    {
        $this->setRabbitmqAdminPassword($rabbitmqAdminPassword);
        $this->setRabbitmqManagementDomain($rabbitmqManagementDomain);
    }

    public function getRabbitmqAdminPassword(): string
    {
        return $this->getAttribute('rabbitmq_admin_password');
    }

    /**
     * @throws ValidationException
     */
    public function setRabbitmqAdminPassword(string $rabbitmqAdminPassword): self
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

    public function setRabbitmqManagementDomain(string $rabbitmqManagementDomain): self
    {
        $this->setAttribute('rabbitmq_management_domain', $rabbitmqManagementDomain);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            rabbitmqAdminPassword: Arr::get($data, 'rabbitmq_admin_password'),
            rabbitmqManagementDomain: Arr::get($data, 'rabbitmq_management_domain'),
        ));
    }
}
