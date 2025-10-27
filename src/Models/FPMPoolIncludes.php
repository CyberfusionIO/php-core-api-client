<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class FPMPoolIncludes extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function __construct(UNIXUserResource $unixUser, ClusterResource $cluster)
    {
        $this->setUnixUser($unixUser);
        $this->setCluster($cluster);
    }

    public function getUnixUser(): UNIXUserResource
    {
        return $this->getAttribute('unix_user');
    }

    public function setUnixUser(UNIXUserResource $unixUser): self
    {
        $this->setAttribute('unix_user', $unixUser);
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
            unixUser: UNIXUserResource::fromArray(Arr::get($data, 'unix_user')),
            cluster: ClusterResource::fromArray(Arr::get($data, 'cluster')),
        ));
    }
}
