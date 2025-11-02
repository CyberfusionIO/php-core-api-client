<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class NodeAddOnIncludes extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function __construct(?NodeResource $node = null, ?ClusterResource $cluster = null)
    {
        $this->setNode($node);
        $this->setCluster($cluster);
    }

    public function getNode(): NodeResource|null
    {
        return $this->getAttribute('node');
    }

    public function setNode(?NodeResource $node): self
    {
        $this->setAttribute('node', $node);
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
            node: Arr::get($data, 'node') !== null ? NodeResource::fromArray(Arr::get($data, 'node')) : null,
            cluster: Arr::get($data, 'cluster') !== null ? ClusterResource::fromArray(Arr::get($data, 'cluster')) : null,
        ));
    }
}
