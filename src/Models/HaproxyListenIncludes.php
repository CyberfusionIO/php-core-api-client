<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class HaproxyListenIncludes extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function __construct(?ClusterResource $destinationCluster = null, ?ClusterResource $cluster = null)
    {
        $this->setDestinationCluster($destinationCluster);
        $this->setCluster($cluster);
    }

    public function getDestinationCluster(): ClusterResource|null
    {
        return $this->getAttribute('destination_cluster');
    }

    public function setDestinationCluster(?ClusterResource $destinationCluster): self
    {
        $this->setAttribute('destination_cluster', $destinationCluster);
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
            destinationCluster: Arr::get($data, 'destination_cluster') !== null ? ClusterResource::fromArray(Arr::get($data, 'destination_cluster')) : null,
            cluster: Arr::get($data, 'cluster') !== null ? ClusterResource::fromArray(Arr::get($data, 'cluster')) : null,
        ));
    }
}
