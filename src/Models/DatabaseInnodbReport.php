<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class DatabaseInnodbReport extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function __construct(
        int $innodbBufferPoolSizeBytes,
        int $totalInnodbDataLengthBytes,
        array $databasesInnodbDataLengths,
    ) {
        $this->setInnodbBufferPoolSizeBytes($innodbBufferPoolSizeBytes);
        $this->setTotalInnodbDataLengthBytes($totalInnodbDataLengthBytes);
        $this->setDatabasesInnodbDataLengths($databasesInnodbDataLengths);
    }

    public function getInnodbBufferPoolSizeBytes(): int
    {
        return $this->getAttribute('innodb_buffer_pool_size_bytes');
    }

    public function setInnodbBufferPoolSizeBytes(int $innodbBufferPoolSizeBytes): self
    {
        $this->setAttribute('innodb_buffer_pool_size_bytes', $innodbBufferPoolSizeBytes);
        return $this;
    }

    public function getTotalInnodbDataLengthBytes(): int
    {
        return $this->getAttribute('total_innodb_data_length_bytes');
    }

    public function setTotalInnodbDataLengthBytes(int $totalInnodbDataLengthBytes): self
    {
        $this->setAttribute('total_innodb_data_length_bytes', $totalInnodbDataLengthBytes);
        return $this;
    }

    public function getDatabasesInnodbDataLengths(): array
    {
        return $this->getAttribute('databases_innodb_data_lengths');
    }

    public function setDatabasesInnodbDataLengths(array $databasesInnodbDataLengths): self
    {
        $this->setAttribute('databases_innodb_data_lengths', $databasesInnodbDataLengths);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            innodbBufferPoolSizeBytes: Arr::get($data, 'innodb_buffer_pool_size_bytes'),
            totalInnodbDataLengthBytes: Arr::get($data, 'total_innodb_data_length_bytes'),
            databasesInnodbDataLengths: Arr::get($data, 'databases_innodb_data_lengths'),
        ));
    }
}
