<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class DatabaseInnodbDataLengths extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function __construct(string $name, int $totalLengthBytes, array $tablesDataLengths)
    {
        $this->setName($name);
        $this->setTotalLengthBytes($totalLengthBytes);
        $this->setTablesDataLengths($tablesDataLengths);
    }

    public function getName(): string
    {
        return $this->getAttribute('name');
    }

    public function setName(string $name): self
    {
        $this->setAttribute('name', $name);
        return $this;
    }

    public function getTotalLengthBytes(): int
    {
        return $this->getAttribute('total_length_bytes');
    }

    public function setTotalLengthBytes(int $totalLengthBytes): self
    {
        $this->setAttribute('total_length_bytes', $totalLengthBytes);
        return $this;
    }

    public function getTablesDataLengths(): array
    {
        return $this->getAttribute('tables_data_lengths');
    }

    public function setTablesDataLengths(array $tablesDataLengths): self
    {
        $this->setAttribute('tables_data_lengths', $tablesDataLengths);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            name: Arr::get($data, 'name'),
            totalLengthBytes: Arr::get($data, 'total_length_bytes'),
            tablesDataLengths: Arr::get($data, 'tables_data_lengths'),
        ));
    }
}
