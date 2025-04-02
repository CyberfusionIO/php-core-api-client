<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Cyberfusion\CoreApi\Support\ValidationHelper;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class DatabaseComparison extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(
        ?array $identicalTablesNames = null,
        ?array $notIdenticalTablesNames = null,
        ?array $onlyLeftTablesNames = null,
        ?array $onlyRightTablesNames = null,
    ) {
        $this->setIdenticalTablesNames($identicalTablesNames);
        $this->setNotIdenticalTablesNames($notIdenticalTablesNames);
        $this->setOnlyLeftTablesNames($onlyLeftTablesNames);
        $this->setOnlyRightTablesNames($onlyRightTablesNames);
    }

    public function getIdenticalTablesNames(): array|null
    {
        return $this->getAttribute('identicalTablesNames');
    }

    /**
     * @throws ValidationException
     */
    public function setIdenticalTablesNames(?array $identicalTablesNames = []): self
    {
        Validator::create()
            ->unique()
            ->assert(ValidationHelper::prepareArray($identicalTablesNames));
        $this->setAttribute('identical_tables_names', $identicalTablesNames);
        return $this;
    }

    public function getNotIdenticalTablesNames(): array|null
    {
        return $this->getAttribute('notIdenticalTablesNames');
    }

    /**
     * @throws ValidationException
     */
    public function setNotIdenticalTablesNames(?array $notIdenticalTablesNames = []): self
    {
        Validator::create()
            ->unique()
            ->assert(ValidationHelper::prepareArray($notIdenticalTablesNames));
        $this->setAttribute('not_identical_tables_names', $notIdenticalTablesNames);
        return $this;
    }

    public function getOnlyLeftTablesNames(): array|null
    {
        return $this->getAttribute('onlyLeftTablesNames');
    }

    /**
     * @throws ValidationException
     */
    public function setOnlyLeftTablesNames(?array $onlyLeftTablesNames = []): self
    {
        Validator::create()
            ->unique()
            ->assert(ValidationHelper::prepareArray($onlyLeftTablesNames));
        $this->setAttribute('only_left_tables_names', $onlyLeftTablesNames);
        return $this;
    }

    public function getOnlyRightTablesNames(): array|null
    {
        return $this->getAttribute('onlyRightTablesNames');
    }

    /**
     * @throws ValidationException
     */
    public function setOnlyRightTablesNames(?array $onlyRightTablesNames = []): self
    {
        Validator::create()
            ->unique()
            ->assert(ValidationHelper::prepareArray($onlyRightTablesNames));
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
