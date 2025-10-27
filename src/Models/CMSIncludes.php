<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class CMSIncludes extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function __construct(VirtualHostResource $virtualHost, ClusterResource $cluster)
    {
        $this->setVirtualHost($virtualHost);
        $this->setCluster($cluster);
    }

    public function getVirtualHost(): VirtualHostResource
    {
        return $this->getAttribute('virtual_host');
    }

    public function setVirtualHost(VirtualHostResource $virtualHost): self
    {
        $this->setAttribute('virtual_host', $virtualHost);
        return $this;
    }

    public function getCluster(): ClusterResource
    {
        return $this->getAttribute('cluster');
    }

    public function setCluster(ClusterResource $cluster): self
    {
        $this->setAttribute('cluster', $cluster);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            virtualHost: VirtualHostResource::fromArray(Arr::get($data, 'virtual_host')),
            cluster: ClusterResource::fromArray(Arr::get($data, 'cluster')),
        ));
    }
}
