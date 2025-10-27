<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class ClusterElasticsearchPropertiesUpdateRequest extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function getElasticsearchDefaultUsersPassword(): string|null
    {
        return $this->getAttribute('elasticsearch_default_users_password');
    }

    public function setElasticsearchDefaultUsersPassword(?string $elasticsearchDefaultUsersPassword): self
    {
        $this->setAttribute('elasticsearch_default_users_password', $elasticsearchDefaultUsersPassword);
        return $this;
    }

    public function getKibanaDomain(): string|null
    {
        return $this->getAttribute('kibana_domain');
    }

    public function setKibanaDomain(?string $kibanaDomain): self
    {
        $this->setAttribute('kibana_domain', $kibanaDomain);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
        ))
            ->when(Arr::has($data, 'elasticsearch_default_users_password'), fn (self $model) => $model->setElasticsearchDefaultUsersPassword(Arr::get($data, 'elasticsearch_default_users_password')))
            ->when(Arr::has($data, 'kibana_domain'), fn (self $model) => $model->setKibanaDomain(Arr::get($data, 'kibana_domain')));
    }
}
