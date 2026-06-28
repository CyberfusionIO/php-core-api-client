<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class CmsDatabaseIndex extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function __construct(string $tableName, string $columnName)
    {
        $this->setTableName($tableName);
        $this->setColumnName($columnName);
    }

    public function getTableName(): string
    {
        return $this->getAttribute('table_name');
    }

    /**
     * @throws ValidationException
     */
    public function setTableName(string $tableName): self
    {
        Validator::create()
            ->length(min: 1)
            ->assert($tableName);
        $this->setAttribute('table_name', $tableName);
        return $this;
    }

    public function getColumnName(): string
    {
        return $this->getAttribute('column_name');
    }

    /**
     * @throws ValidationException
     */
    public function setColumnName(string $columnName): self
    {
        Validator::create()
            ->length(min: 1)
            ->assert($columnName);
        $this->setAttribute('column_name', $columnName);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            tableName: Arr::get($data, 'table_name'),
            columnName: Arr::get($data, 'column_name'),
        ));
    }
}
