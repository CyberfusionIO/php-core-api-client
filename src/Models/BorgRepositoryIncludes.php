<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class BorgRepositoryIncludes extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(ClusterResource $cluster, ?UNIXUserResource $unixUser = null)
    {
        $this->setCluster($cluster);
        $this->setUnixUser($unixUser);
    }

    public function getUnixUser(): UNIXUserResource|null
    {
        return $this->getAttribute('unix_user');
    }

    public function setUnixUser(?UNIXUserResource $unixUser = null): self
    {
        $this->setAttribute('unix_user', $unixUser);
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
            cluster: ClusterResource::fromArray(Arr::get($data, 'cluster')),
            unixUser: Arr::get($data, 'unix_user') !== null ? UNIXUserResource::fromArray(Arr::get($data, 'unix_user')) : null,
        ));
    }
}
