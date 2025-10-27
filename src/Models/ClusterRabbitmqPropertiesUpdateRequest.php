<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class ClusterRabbitmqPropertiesUpdateRequest extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

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
            ->when(Arr::has($data, 'rabbitmq_admin_password'), fn (self $model) => $model->setRabbitmqAdminPassword(Arr::get($data, 'rabbitmq_admin_password')))
            ->when(Arr::has($data, 'rabbitmq_management_domain'), fn (self $model) => $model->setRabbitmqManagementDomain(Arr::get($data, 'rabbitmq_management_domain')));
    }
}
