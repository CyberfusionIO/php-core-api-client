<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class ClusterGrafanaPropertiesResource extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(int $id, string $createdAt, string $updatedAt, string $grafanaDomain, int $clusterId)
    {
        $this->setId($id);
        $this->setCreatedAt($createdAt);
        $this->setUpdatedAt($updatedAt);
        $this->setGrafanaDomain($grafanaDomain);
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
        return $this->getAttribute('created_at');
    }

    public function setCreatedAt(?string $createdAt = null): self
    {
        $this->setAttribute('created_at', $createdAt);
        return $this;
    }

    public function getUpdatedAt(): string
    {
        return $this->getAttribute('updated_at');
    }

    public function setUpdatedAt(?string $updatedAt = null): self
    {
        $this->setAttribute('updated_at', $updatedAt);
        return $this;
    }

    public function getGrafanaDomain(): string
    {
        return $this->getAttribute('grafana_domain');
    }

    public function setGrafanaDomain(?string $grafanaDomain = null): self
    {
        $this->setAttribute('grafana_domain', $grafanaDomain);
        return $this;
    }

    public function getClusterId(): int
    {
        return $this->getAttribute('cluster_id');
    }

    public function setClusterId(?int $clusterId = null): self
    {
        $this->setAttribute('cluster_id', $clusterId);
        return $this;
    }

    public function getIncludes(): ClusterGrafanaPropertiesIncludes|null
    {
        return $this->getAttribute('includes');
    }

    public function setIncludes(?ClusterGrafanaPropertiesIncludes $includes): self
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
            grafanaDomain: Arr::get($data, 'grafana_domain'),
            clusterId: Arr::get($data, 'cluster_id'),
        ))
            ->setIncludes(Arr::get($data, 'includes') !== null ? ClusterGrafanaPropertiesIncludes::fromArray(Arr::get($data, 'includes')) : null);
    }
}
