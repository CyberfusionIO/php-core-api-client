<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class DatabaseComparison extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(
        array $identicalTablesNames,
        array $notIdenticalTablesNames,
        array $onlyLeftTablesNames,
        array $onlyRightTablesNames,
    ) {
        $this->setIdenticalTablesNames($identicalTablesNames);
        $this->setNotIdenticalTablesNames($notIdenticalTablesNames);
        $this->setOnlyLeftTablesNames($onlyLeftTablesNames);
        $this->setOnlyRightTablesNames($onlyRightTablesNames);
    }

    public function getIdenticalTablesNames(): array
    {
        return $this->getAttribute('identical_tables_names');
    }

    /**
     * @throws ValidationException
     */
    public function setIdenticalTablesNames(array $identicalTablesNames = []): self
    {
        Validator::create()
            ->unique()
            ->assert($identicalTablesNames);
        $this->setAttribute('identical_tables_names', $identicalTablesNames);
        return $this;
    }

    public function getNotIdenticalTablesNames(): array
    {
        return $this->getAttribute('not_identical_tables_names');
    }

    /**
     * @throws ValidationException
     */
    public function setNotIdenticalTablesNames(array $notIdenticalTablesNames = []): self
    {
        Validator::create()
            ->unique()
            ->assert($notIdenticalTablesNames);
        $this->setAttribute('not_identical_tables_names', $notIdenticalTablesNames);
        return $this;
    }

    public function getOnlyLeftTablesNames(): array
    {
        return $this->getAttribute('only_left_tables_names');
    }

    /**
     * @throws ValidationException
     */
    public function setOnlyLeftTablesNames(array $onlyLeftTablesNames = []): self
    {
        Validator::create()
            ->unique()
            ->assert($onlyLeftTablesNames);
        $this->setAttribute('only_left_tables_names', $onlyLeftTablesNames);
        return $this;
    }

    public function getOnlyRightTablesNames(): array
    {
        return $this->getAttribute('only_right_tables_names');
    }

    /**
     * @throws ValidationException
     */
    public function setOnlyRightTablesNames(array $onlyRightTablesNames = []): self
    {
        Validator::create()
            ->unique()
            ->assert($onlyRightTablesNames);
        $this->setAttribute('only_right_tables_names', $onlyRightTablesNames);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            identicalTablesNames: Arr::get($data, 'identical_tables_names'),
            notIdenticalTablesNames: Arr::get($data, 'not_identical_tables_names'),
            onlyLeftTablesNames: Arr::get($data, 'only_left_tables_names'),
            onlyRightTablesNames: Arr::get($data, 'only_right_tables_names'),
        ));
    }
}
