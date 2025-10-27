<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class ClusterElasticsearchPropertiesResource extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function __construct(
        int $id,
        string $createdAt,
        string $updatedAt,
        string $elasticsearchDefaultUsersPassword,
        string $kibanaDomain,
        int $clusterId,
        ClusterElasticsearchPropertiesIncludes $includes,
    ) {
        $this->setId($id);
        $this->setCreatedAt($createdAt);
        $this->setUpdatedAt($updatedAt);
        $this->setElasticsearchDefaultUsersPassword($elasticsearchDefaultUsersPassword);
        $this->setKibanaDomain($kibanaDomain);
        $this->setClusterId($clusterId);
        $this->setIncludes($includes);
    }

    public function getId(): int
    {
        return $this->getAttribute('id');
    }

    public function setId(int $id): self
    {
        $this->setAttribute('id', $id);
        return $this;
    }

    public function getCreatedAt(): string
    {
        return $this->getAttribute('created_at');
    }

    public function setCreatedAt(string $createdAt): self
    {
        $this->setAttribute('created_at', $createdAt);
        return $this;
    }

    public function getUpdatedAt(): string
    {
        return $this->getAttribute('updated_at');
    }

    public function setUpdatedAt(string $updatedAt): self
    {
        $this->setAttribute('updated_at', $updatedAt);
        return $this;
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

    public function getClusterId(): int
    {
        return $this->getAttribute('cluster_id');
    }

    public function setClusterId(int $clusterId): self
    {
        $this->setAttribute('cluster_id', $clusterId);
        return $this;
    }

    public function getIncludes(): ClusterElasticsearchPropertiesIncludes
    {
        return $this->getAttribute('includes');
    }

    public function setIncludes(ClusterElasticsearchPropertiesIncludes $includes): self
    {
        $this->setAttribute('includes', $includes);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            id: Arr::get($data, 'id'),
            createdAt: Arr::get($data, 'created_at'),
            updatedAt: Arr::get($data, 'updated_at'),
            elasticsearchDefaultUsersPassword: Arr::get($data, 'elasticsearch_default_users_password'),
            kibanaDomain: Arr::get($data, 'kibana_domain'),
            clusterId: Arr::get($data, 'cluster_id'),
            includes: ClusterElasticsearchPropertiesIncludes::fromArray(Arr::get($data, 'includes')),
        ));
    }
}
