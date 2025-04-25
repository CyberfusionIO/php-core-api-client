<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class HostsEntryIncludes extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(NodeResource $node, ClusterResource $cluster)
    {
        $this->setNode($node);
        $this->setCluster($cluster);
    }

    public function getNode(): NodeResource
    {
        return $this->getAttribute('node');
    }

    public function setNode(?NodeResource $node = null): self
    {
        $this->setAttribute('node', $node);
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
            node: NodeResource::fromArray(Arr::get($data, 'node')),
            cluster: ClusterResource::fromArray(Arr::get($data, 'cluster')),
        ));
    }
}
