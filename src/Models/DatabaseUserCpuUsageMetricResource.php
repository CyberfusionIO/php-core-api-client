<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class DatabaseUserCpuUsageMetricResource extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function __construct(string $databaseUserName, string $nodeHostname, int $timestamp, float $value)
    {
        $this->setDatabaseUserName($databaseUserName);
        $this->setNodeHostname($nodeHostname);
        $this->setTimestamp($timestamp);
        $this->setValue($value);
    }

    public function getDatabaseUserName(): string
    {
        return $this->getAttribute('database_user_name');
    }

    public function setDatabaseUserName(string $databaseUserName): self
    {
        $this->setAttribute('database_user_name', $databaseUserName);
        return $this;
    }

    public function getNodeHostname(): string
    {
        return $this->getAttribute('node_hostname');
    }

    public function setNodeHostname(string $nodeHostname): self
    {
        $this->setAttribute('node_hostname', $nodeHostname);
        return $this;
    }

    public function getTimestamp(): int
    {
        return $this->getAttribute('timestamp');
    }

    public function setTimestamp(int $timestamp): self
    {
        $this->setAttribute('timestamp', $timestamp);
        return $this;
    }

    public function getValue(): float
    {
        return $this->getAttribute('value');
    }

    public function setValue(float $value): self
    {
        $this->setAttribute('value', $value);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            databaseUserName: Arr::get($data, 'database_user_name'),
            nodeHostname: Arr::get($data, 'node_hostname'),
            timestamp: Arr::get($data, 'timestamp'),
            value: Arr::get($data, 'value'),
        ));
    }
}
