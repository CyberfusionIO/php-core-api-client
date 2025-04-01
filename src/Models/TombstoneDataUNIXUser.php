<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class TombstoneDataUNIXUser extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(string $homeDirectory)
    {
        $this->setHomeDirectory($homeDirectory);
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

    public function getHomeDirectory(): string
    {
        return $this->getAttribute('homeDirectory');
    }

    public function setHomeDirectory(?string $homeDirectory = null): self
    {
        $this->setAttribute('homeDirectory', $homeDirectory);
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
            homeDirectory: Arr::get($data, 'home_directory'),
        ))
            ->setDataType(Arr::get($data, 'data_type'))
            ->setDeleteOnCluster(Arr::get($data, 'delete_on_cluster'));
    }
}
