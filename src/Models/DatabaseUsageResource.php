<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class DatabaseUsageResource extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function __construct(int $databaseId, float $usage, string $timestamp, DatabaseUsageIncludes $includes)
    {
        $this->setDatabaseId($databaseId);
        $this->setUsage($usage);
        $this->setTimestamp($timestamp);
        $this->setIncludes($includes);
    }

    public function getDatabaseId(): int
    {
        return $this->getAttribute('database_id');
    }

    public function setDatabaseId(int $databaseId): self
    {
        $this->setAttribute('database_id', $databaseId);
        return $this;
    }

    public function getUsage(): float
    {
        return $this->getAttribute('usage');
    }

    public function setUsage(float $usage): self
    {
        $this->setAttribute('usage', $usage);
        return $this;
    }

    public function getTimestamp(): string
    {
        return $this->getAttribute('timestamp');
    }

    public function setTimestamp(string $timestamp): self
    {
        $this->setAttribute('timestamp', $timestamp);
        return $this;
    }

    public function getIncludes(): DatabaseUsageIncludes
    {
        return $this->getAttribute('includes');
    }

    public function setIncludes(DatabaseUsageIncludes $includes): self
    {
        $this->setAttribute('includes', $includes);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            databaseId: Arr::get($data, 'database_id'),
            usage: Arr::get($data, 'usage'),
            timestamp: Arr::get($data, 'timestamp'),
            includes: DatabaseUsageIncludes::fromArray(Arr::get($data, 'includes')),
        ));
    }
}
