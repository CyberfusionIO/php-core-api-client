<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class TaskCollectionIncludes extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(?ClusterResource $cluster = null)
    {
        $this->setCluster($cluster);
    }

    public function getCluster(): ClusterResource|null
    {
        return $this->getAttribute('cluster');
    }

    public function setCluster(?ClusterResource $cluster = null): self
    {
        $this->setAttribute('cluster', $cluster);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            cluster: Arr::get($data, 'cluster') !== null ? ClusterResource::fromArray(Arr::get($data, 'cluster')) : null,
        ));
    }
}
