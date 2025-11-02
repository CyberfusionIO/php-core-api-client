<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class DatabaseUserGrantIncludes extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function __construct(
        ?ClusterResource $cluster = null,
        ?DatabaseResource $database = null,
        ?DatabaseUserResource $databaseUser = null,
    ) {
        $this->setCluster($cluster);
        $this->setDatabase($database);
        $this->setDatabaseUser($databaseUser);
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

    public function getDatabase(): DatabaseResource|null
    {
        return $this->getAttribute('database');
    }

    public function setDatabase(?DatabaseResource $database): self
    {
        $this->setAttribute('database', $database);
        return $this;
    }

    public function getDatabaseUser(): DatabaseUserResource|null
    {
        return $this->getAttribute('database_user');
    }

    public function setDatabaseUser(?DatabaseUserResource $databaseUser): self
    {
        $this->setAttribute('database_user', $databaseUser);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            cluster: Arr::get($data, 'cluster') !== null ? ClusterResource::fromArray(Arr::get($data, 'cluster')) : null,
            database: Arr::get($data, 'database') !== null ? DatabaseResource::fromArray(Arr::get($data, 'database')) : null,
            databaseUser: Arr::get($data, 'database_user') !== null ? DatabaseUserResource::fromArray(Arr::get($data, 'database_user')) : null,
        ));
    }
}
