<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class DatabaseUsageResource extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(int $databaseId, string $usage, string $timestamp)
    {
        $this->setDatabaseId($databaseId);
        $this->setUsage($usage);
        $this->setTimestamp($timestamp);
    }

    public function getDatabaseId(): int
    {
        return $this->getAttribute('databaseId');
    }

    public function setDatabaseId(?int $databaseId = null): self
    {
        $this->setAttribute('databaseId', $databaseId);
        return $this;
    }

    public function getUsage(): string
    {
        return $this->getAttribute('usage');
    }

    public function setUsage(?string $usage = null): self
    {
        $this->setAttribute('usage', $usage);
        return $this;
    }

    public function getTimestamp(): string
    {
        return $this->getAttribute('timestamp');
    }

    public function setTimestamp(?string $timestamp = null): self
    {
        $this->setAttribute('timestamp', $timestamp);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            databaseId: Arr::get($data, 'database_id'),
            usage: Arr::get($data, 'usage'),
            timestamp: Arr::get($data, 'timestamp'),
        ));
    }
}
