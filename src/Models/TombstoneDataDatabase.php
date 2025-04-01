<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Enums\DatabaseServerSoftwareNameEnum;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class TombstoneDataDatabase extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(string $name, DatabaseServerSoftwareNameEnum $serverSoftwareName)
    {
        $this->setName($name);
        $this->setServerSoftwareName($serverSoftwareName);
    }

    public function getDataType(): string
    {
        return $this->getAttribute('dataType');
    }

    public function setDataType(string $dataType): self
    {
        $this->setAttribute('dataType', $dataType);
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
            ->length(min: 1, max: 63)
            ->regex('/^[a-z0-9-_]+$/')
            ->assert($name);
        $this->setAttribute('name', $name);
        return $this;
    }

    public function getServerSoftwareName(): DatabaseServerSoftwareNameEnum
    {
        return $this->getAttribute('serverSoftwareName');
    }

    public function setServerSoftwareName(?DatabaseServerSoftwareNameEnum $serverSoftwareName = null): self
    {
        $this->setAttribute('serverSoftwareName', $serverSoftwareName);
        return $this;
    }

    public function getDeleteOnCluster(): bool
    {
        return $this->getAttribute('deleteOnCluster');
    }

    public function setDeleteOnCluster(bool $deleteOnCluster): self
    {
        $this->setAttribute('deleteOnCluster', $deleteOnCluster);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            name: Arr::get($data, 'name'),
            serverSoftwareName: DatabaseServerSoftwareNameEnum::tryFrom(Arr::get($data, 'server_software_name')),
        ))
            ->setDataType(Arr::get($data, 'data_type'))
            ->setDeleteOnCluster(Arr::get($data, 'delete_on_cluster'));
    }
}
