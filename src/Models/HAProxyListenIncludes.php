<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class HAProxyListenIncludes extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(ClusterResource $destinationCluster, ClusterResource $cluster)
    {
        $this->setDestinationCluster($destinationCluster);
        $this->setCluster($cluster);
    }

    public function getDestinationCluster(): ClusterResource
    {
        return $this->getAttribute('destination_cluster');
    }

    public function setDestinationCluster(?ClusterResource $destinationCluster = null): self
    {
        $this->setAttribute('destination_cluster', $destinationCluster);
        return $this;
    }

    public function getCluster(): ClusterResource
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
            destinationCluster: ClusterResource::fromArray(Arr::get($data, 'destination_cluster')),
            cluster: ClusterResource::fromArray(Arr::get($data, 'cluster')),
        ));
    }
}
