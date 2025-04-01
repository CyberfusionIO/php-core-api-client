<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class BorgArchiveCreateDatabaseRequest extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(int $borgRepositoryId, string $name, int $databaseId)
    {
        $this->setBorgRepositoryId($borgRepositoryId);
        $this->setName($name);
        $this->setDatabaseId($databaseId);
    }

    public function getBorgRepositoryId(): int
    {
        return $this->getAttribute('borgRepositoryId');
    }

    public function setBorgRepositoryId(?int $borgRepositoryId = null): self
    {
        $this->setAttribute('borgRepositoryId', $borgRepositoryId);
        return $this;
    }

    public function getName(): string
    {
        return $this->getAttribute('name');
    }

    /**
     * @throws ValidationException
     */
    public function setName(?string $name = null): self
    {
        Validator::create()
            ->length(min: 1, max: 64)
            ->regex('/^[a-zA-Z0-9-_]+$/')
            ->assert($name);
        $this->setAttribute('name', $name);
        return $this;
    }

    public function getDatabaseId(): int
    {
        return $this->getAttribute('databaseId');
    }

    public function setDatabaseId(?int $databaseId = null): self
    {
        $this->setAttribute('databaseId', $databaseId);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            borgRepositoryId: Arr::get($data, 'borg_repository_id'),
            name: Arr::get($data, 'name'),
            databaseId: Arr::get($data, 'database_id'),
        ));
    }
}
