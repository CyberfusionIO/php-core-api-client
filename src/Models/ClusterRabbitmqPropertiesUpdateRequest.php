<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class ClusterRabbitmqPropertiesUpdateRequest extends CoreApiModel implements CoreApiModelContract
{
    public function __construct()
    {
    }

    public function getRabbitmqAdminPassword(): string|null
    {
        return $this->getAttribute('rabbitmq_admin_password');
    }

    public function setRabbitmqAdminPassword(?string $rabbitmqAdminPassword): self
    {
        $this->setAttribute('rabbitmq_admin_password', $rabbitmqAdminPassword);
        return $this;
    }

    public function getRabbitmqManagementDomain(): string|null
    {
        return $this->getAttribute('rabbitmq_management_domain');
    }

    public function setRabbitmqManagementDomain(?string $rabbitmqManagementDomain): self
    {
        $this->setAttribute('rabbitmq_management_domain', $rabbitmqManagementDomain);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
        ))
            ->setRabbitmqAdminPassword(Arr::get($data, 'rabbitmq_admin_password'))
            ->setRabbitmqManagementDomain(Arr::get($data, 'rabbitmq_management_domain'));
    }
}
