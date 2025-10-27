<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class TombstoneDataDatabaseUserGrantIncludes extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function __construct(
        DatabaseResource|TombstoneDataDatabase $database,
        DatabaseUserResource|TombstoneDataDatabaseUser $databaseUser,
    ) {
        $this->setDatabase($database);
        $this->setDatabaseUser($databaseUser);
    }

    public function getDatabase(): DatabaseResource|TombstoneDataDatabase
    {
        return $this->getAttribute('database');
    }

    public function setDatabase(DatabaseResource|TombstoneDataDatabase $database): self
    {
        $this->setAttribute('database', $database);
        return $this;
    }

    public function getDatabaseUser(): DatabaseUserResource|TombstoneDataDatabaseUser
    {
        return $this->getAttribute('database_user');
    }

    public function setDatabaseUser(DatabaseUserResource|TombstoneDataDatabaseUser $databaseUser): self
    {
        $this->setAttribute('database_user', $databaseUser);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            database: DatabaseResource::fromArray(Arr::get($data, 'database')),
            databaseUser: DatabaseUserResource::fromArray(Arr::get($data, 'database_user')),
        ));
    }
}
