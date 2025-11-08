<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Enums\DatabaseServerSoftwareNameEnum;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class TombstoneDataDatabaseUser extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function __construct(
        int $id,
        string $name,
        DatabaseServerSoftwareNameEnum $serverSoftwareName,
        TombstoneDataDatabaseUserIncludes $includes,
        ?string $host = null,
    ) {
        $this->setId($id);
        $this->setName($name);
        $this->setServerSoftwareName($serverSoftwareName);
        $this->setIncludes($includes);
        $this->setHost($host);
    }

    public function getDataType(): string
    {
        return $this->getAttribute('data_type');
    }

    public function setDataType(string $dataType): self
    {
        $this->setAttribute('data_type', $dataType);
        return $this;
    }

    public function getId(): int
    {
        return $this->getAttribute('id');
    }

    public function setId(int $id): self
    {
        $this->setAttribute('id', $id);
        return $this;
    }

    public function getName(): string
    {
        return $this->getAttribute('name');
    }

    /**
     * @throws ValidationException
     */
    public function setName(string $name): self
    {
        Validator::create()
            ->length(min: 1, max: 63)
            ->regex('/^[a-z0-9-_]+$/')
            ->assert($name);
        $this->setAttribute('name', $name);
        return $this;
    }

    public function getHost(): string|null
    {
        return $this->getAttribute('host');
    }

    public function setHost(?string $host): self
    {
        $this->setAttribute('host', $host);
        return $this;
    }

    public function getServerSoftwareName(): DatabaseServerSoftwareNameEnum
    {
        return $this->getAttribute('server_software_name');
    }

    public function setServerSoftwareName(DatabaseServerSoftwareNameEnum $serverSoftwareName): self
    {
        $this->setAttribute('server_software_name', $serverSoftwareName);
        return $this;
    }

    public function getIncludes(): TombstoneDataDatabaseUserIncludes
    {
        return $this->getAttribute('includes');
    }

    public function setIncludes(TombstoneDataDatabaseUserIncludes $includes): self
    {
        $this->setAttribute('includes', $includes);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            id: Arr::get($data, 'id'),
            name: Arr::get($data, 'name'),
            serverSoftwareName: DatabaseServerSoftwareNameEnum::tryFrom(Arr::get($data, 'server_software_name')),
            includes: TombstoneDataDatabaseUserIncludes::fromArray(Arr::get($data, 'includes')),
            host: Arr::get($data, 'host'),
        ))
            ->when(Arr::has($data, 'data_type'), fn (self $model) => $model->setDataType(Arr::get($data, 'data_type', 'database_user')));
    }
}
