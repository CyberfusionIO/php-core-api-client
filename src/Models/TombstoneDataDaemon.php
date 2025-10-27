<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class TombstoneDataDaemon extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function __construct(int $id, string $name, array $nodesIds, TombstoneDataDaemonIncludes $includes)
    {
        $this->setId($id);
        $this->setName($name);
        $this->setNodesIds($nodesIds);
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
            ->length(min: 1, max: 64)
            ->regex('/^[a-z0-9-_]+$/')
            ->assert($name);
        $this->setAttribute('name', $name);
        return $this;
    }

    public function getNodesIds(): array
    {
        return $this->getAttribute('nodes_ids');
    }

    /**
     * @throws ValidationException
     */
    public function setNodesIds(array $nodesIds): self
    {
        Validator::create()
            ->unique()
            ->assert($nodesIds);
        $this->setAttribute('nodes_ids', $nodesIds);
        return $this;
    }

    public function getIncludes(): TombstoneDataDaemonIncludes
    {
        return $this->getAttribute('includes');
    }

    public function setIncludes(TombstoneDataDaemonIncludes $includes): self
    {
        $this->setAttribute('includes', $includes);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            id: Arr::get($data, 'id'),
            name: Arr::get($data, 'name'),
            nodesIds: Arr::get($data, 'nodes_ids'),
            includes: TombstoneDataDaemonIncludes::fromArray(Arr::get($data, 'includes')),
        ))
            ->when(Arr::has($data, 'data_type'), fn (self $model) => $model->setDataType(Arr::get($data, 'data_type', 'daemon')));
    }
}
