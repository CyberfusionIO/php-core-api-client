<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class TableInnodbDataLengths extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function __construct(string $name, int $dataLengthBytes, int $indexLengthBytes, int $totalLengthBytes)
    {
        $this->setName($name);
        $this->setDataLengthBytes($dataLengthBytes);
        $this->setIndexLengthBytes($indexLengthBytes);
        $this->setTotalLengthBytes($totalLengthBytes);
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

    public function getDataLengthBytes(): int
    {
        return $this->getAttribute('data_length_bytes');
    }

    public function setDataLengthBytes(int $dataLengthBytes): self
    {
        $this->setAttribute('data_length_bytes', $dataLengthBytes);
        return $this;
    }

    public function getIndexLengthBytes(): int
    {
        return $this->getAttribute('index_length_bytes');
    }

    public function setIndexLengthBytes(int $indexLengthBytes): self
    {
        $this->setAttribute('index_length_bytes', $indexLengthBytes);
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

    public static function fromArray(array $data): self
    {
        return (new self(
            name: Arr::get($data, 'name'),
            dataLengthBytes: Arr::get($data, 'data_length_bytes'),
            indexLengthBytes: Arr::get($data, 'index_length_bytes'),
            totalLengthBytes: Arr::get($data, 'total_length_bytes'),
        ));
    }
}
