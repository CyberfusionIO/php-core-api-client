<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

/**
 * Properties.
 */
class TombstoneDataCustomConfig extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(int $id, string $name, TombstoneDataCustomConfigIncludes $includes)
    {
        $this->setId($id);
        $this->setName($name);
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
            ->length(min: 1, max: 128)
            ->regex('/^[a-z0-9-_]+$/')
            ->assert($name);
        $this->setAttribute('name', $name);
        return $this;
    }

    public function getIncludes(): TombstoneDataCustomConfigIncludes
    {
        return $this->getAttribute('includes');
    }

    public function setIncludes(?TombstoneDataCustomConfigIncludes $includes = null): self
    {
        $this->setAttribute('includes', $includes);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            id: Arr::get($data, 'id'),
            name: Arr::get($data, 'name'),
            includes: TombstoneDataCustomConfigIncludes::fromArray(Arr::get($data, 'includes')),
        ))
            ->setDataType(Arr::get($data, 'data_type', 'custom_config'));
    }
}
