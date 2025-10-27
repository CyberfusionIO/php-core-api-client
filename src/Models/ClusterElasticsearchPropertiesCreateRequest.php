<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class ClusterElasticsearchPropertiesCreateRequest extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function __construct(string $elasticsearchDefaultUsersPassword, string $kibanaDomain)
    {
        $this->setElasticsearchDefaultUsersPassword($elasticsearchDefaultUsersPassword);
        $this->setKibanaDomain($kibanaDomain);
    }

    public function getElasticsearchDefaultUsersPassword(): string
    {
        return $this->getAttribute('elasticsearch_default_users_password');
    }

    /**
     * @throws ValidationException
     */
    public function setElasticsearchDefaultUsersPassword(string $elasticsearchDefaultUsersPassword): self
    {
        Validator::create()
            ->length(min: 24, max: 255)
            ->regex('/^[a-zA-Z0-9]+$/')
            ->assert($elasticsearchDefaultUsersPassword);
        $this->setAttribute('elasticsearch_default_users_password', $elasticsearchDefaultUsersPassword);
        return $this;
    }

    public function getKibanaDomain(): string
    {
        return $this->getAttribute('kibana_domain');
    }

    public function setKibanaDomain(string $kibanaDomain): self
    {
        $this->setAttribute('kibana_domain', $kibanaDomain);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            elasticsearchDefaultUsersPassword: Arr::get($data, 'elasticsearch_default_users_password'),
            kibanaDomain: Arr::get($data, 'kibana_domain'),
        ));
    }
}
