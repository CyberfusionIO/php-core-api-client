<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class BorgRepositoryIncludes extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function __construct(
        ClusterResource $cluster,
        ?UNIXUserResource $unixUser = null,
        ?DatabaseResource $database = null,
    ) {
        $this->setCluster($cluster);
        $this->setUnixUser($unixUser);
        $this->setDatabase($database);
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

    public function getDatabase(): DatabaseResource|null
    {
        return $this->getAttribute('database');
    }

    public function setDatabase(?DatabaseResource $database): self
    {
        $this->setAttribute('database', $database);
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
            cluster: ClusterResource::fromArray(Arr::get($data, 'cluster')),
            unixUser: Arr::get($data, 'unix_user') !== null ? UNIXUserResource::fromArray(Arr::get($data, 'unix_user')) : null,
            database: Arr::get($data, 'database') !== null ? DatabaseResource::fromArray(Arr::get($data, 'database')) : null,
        ));
    }
}
