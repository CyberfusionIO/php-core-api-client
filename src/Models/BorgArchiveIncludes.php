<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class BorgArchiveIncludes extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function __construct(?BorgRepositoryResource $borgRepository = null, ?ClusterResource $cluster = null)
    {
        $this->setBorgRepository($borgRepository);
        $this->setCluster($cluster);
    }

    public function getBorgRepository(): BorgRepositoryResource|null
    {
        return $this->getAttribute('borg_repository');
    }

    public function setBorgRepository(?BorgRepositoryResource $borgRepository): self
    {
        $this->setAttribute('borg_repository', $borgRepository);
        return $this;
    }

    public function getCluster(): ClusterResource|null
    {
        return $this->getAttribute('cluster');
    }

    public function setCluster(?ClusterResource $cluster): self
    {
        $this->setAttribute('cluster', $cluster);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            borgRepository: Arr::get($data, 'borg_repository') !== null ? BorgRepositoryResource::fromArray(Arr::get($data, 'borg_repository')) : null,
            cluster: Arr::get($data, 'cluster') !== null ? ClusterResource::fromArray(Arr::get($data, 'cluster')) : null,
        ));
    }
}
