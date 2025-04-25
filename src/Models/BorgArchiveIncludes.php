<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class BorgArchiveIncludes extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(
        BorgRepositoryResource $borgRepository,
        ClusterResource $cluster,
        ?UNIXUserResource $unixUser = null,
        ?DatabaseResource $database = null,
    ) {
        $this->setBorgRepository($borgRepository);
        $this->setCluster($cluster);
        $this->setUnixUser($unixUser);
        $this->setDatabase($database);
    }

    public function getBorgRepository(): BorgRepositoryResource
    {
        return $this->getAttribute('borg_repository');
    }

    public function setBorgRepository(?BorgRepositoryResource $borgRepository = null): self
    {
        $this->setAttribute('borg_repository', $borgRepository);
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

    public function getUnixUser(): UNIXUserResource|null
    {
        return $this->getAttribute('unix_user');
    }

    public function setUnixUser(?UNIXUserResource $unixUser = null): self
    {
        $this->setAttribute('unix_user', $unixUser);
        return $this;
    }

    public function getDatabase(): DatabaseResource|null
    {
        return $this->getAttribute('database');
    }

    public function setDatabase(?DatabaseResource $database = null): self
    {
        $this->setAttribute('database', $database);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            borgRepository: BorgRepositoryResource::fromArray(Arr::get($data, 'borg_repository')),
            cluster: ClusterResource::fromArray(Arr::get($data, 'cluster')),
            unixUser: Arr::get($data, 'unix_user') !== null ? UNIXUserResource::fromArray(Arr::get($data, 'unix_user')) : null,
            database: Arr::get($data, 'database') !== null ? DatabaseResource::fromArray(Arr::get($data, 'database')) : null,
        ));
    }
}
