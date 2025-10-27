<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class TombstoneDataVirtualHost extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function __construct(int $id, string $domainRoot, TombstoneDataVirtualHostIncludes $includes)
    {
        $this->setId($id);
        $this->setDomainRoot($domainRoot);
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

    public function setId(int $id): self
    {
        $this->setAttribute('id', $id);
        return $this;
    }

    public function getDomainRoot(): string
    {
        return $this->getAttribute('domain_root');
    }

    public function setDomainRoot(string $domainRoot): self
    {
        $this->setAttribute('domain_root', $domainRoot);
        return $this;
    }

    public function getDeleteOnCluster(): bool
    {
        return $this->getAttribute('delete_on_cluster');
    }

    public function setDeleteOnCluster(bool $deleteOnCluster): self
    {
        $this->setAttribute('delete_on_cluster', $deleteOnCluster);
        return $this;
    }

    public function getIncludes(): TombstoneDataVirtualHostIncludes
    {
        return $this->getAttribute('includes');
    }

    public function setIncludes(TombstoneDataVirtualHostIncludes $includes): self
    {
        $this->setAttribute('includes', $includes);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            id: Arr::get($data, 'id'),
            domainRoot: Arr::get($data, 'domain_root'),
            includes: TombstoneDataVirtualHostIncludes::fromArray(Arr::get($data, 'includes')),
        ))
            ->when(Arr::has($data, 'data_type'), fn (self $model) => $model->setDataType(Arr::get($data, 'data_type', 'virtual_host')))
            ->when(Arr::has($data, 'delete_on_cluster'), fn (self $model) => $model->setDeleteOnCluster(Arr::get($data, 'delete_on_cluster', false)));
    }
}
