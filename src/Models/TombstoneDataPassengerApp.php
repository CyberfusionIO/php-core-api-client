<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class TombstoneDataPassengerApp extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(int $id, string $name, string $appRoot, TombstoneDataPassengerAppIncludes $includes)
    {
        $this->setId($id);
        $this->setName($name);
        $this->setAppRoot($appRoot);
        $this->setIncludes($includes);
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

    public function setId(?int $id = null): self
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
    public function setName(?string $name = null): self
    {
        Validator::create()
            ->length(min: 1, max: 64)
            ->regex('/^[a-z0-9-_]+$/')
            ->assert($name);
        $this->setAttribute('name', $name);
        return $this;
    }

    public function getAppRoot(): string
    {
        return $this->getAttribute('app_root');
    }

    public function setAppRoot(?string $appRoot = null): self
    {
        $this->setAttribute('app_root', $appRoot);
        return $this;
    }

    public function getDeleteOnCluster(): bool
    {
        return $this->getAttribute('delete_on_cluster');
    }

    public function setDeleteOnCluster(bool $deleteOnCluster): self
    {
        $this->setAttribute('delete_on_cluster', $deleteOnCluster);
        return $this;
    }

    public function getIncludes(): TombstoneDataPassengerAppIncludes
    {
        return $this->getAttribute('includes');
    }

    public function setIncludes(?TombstoneDataPassengerAppIncludes $includes = null): self
    {
        $this->setAttribute('includes', $includes);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            id: Arr::get($data, 'id'),
            name: Arr::get($data, 'name'),
            appRoot: Arr::get($data, 'app_root'),
            includes: TombstoneDataPassengerAppIncludes::fromArray(Arr::get($data, 'includes')),
        ))
            ->setDataType(Arr::get($data, 'data_type', 'passenger_app'))
            ->setDeleteOnCluster(Arr::get($data, 'delete_on_cluster', false));
    }
}
