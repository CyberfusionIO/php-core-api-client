<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class CronIncludes extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function __construct(
        ?ClusterResource $cluster = null,
        ?UNIXUserResource $unixUser = null,
        ?NodeResource $node = null,
    ) {
        $this->setCluster($cluster);
        $this->setUnixUser($unixUser);
        $this->setNode($node);
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

    public function getUnixUser(): UNIXUserResource|null
    {
        return $this->getAttribute('unix_user');
    }

    public function setUnixUser(?UNIXUserResource $unixUser): self
    {
        $this->setAttribute('unix_user', $unixUser);
        return $this;
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

    public static function fromArray(array $data): self
    {
        return (new self(
            cluster: Arr::get($data, 'cluster') !== null ? ClusterResource::fromArray(Arr::get($data, 'cluster')) : null,
            unixUser: Arr::get($data, 'unix_user') !== null ? UNIXUserResource::fromArray(Arr::get($data, 'unix_user')) : null,
            node: Arr::get($data, 'node') !== null ? NodeResource::fromArray(Arr::get($data, 'node')) : null,
        ));
    }
}
