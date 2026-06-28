<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class DaemonMemoryUsageMetricResource extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function __construct(string $daemonName, string $nodeHostname, int $timestamp, int $value)
    {
        $this->setDaemonName($daemonName);
        $this->setNodeHostname($nodeHostname);
        $this->setTimestamp($timestamp);
        $this->setValue($value);
    }

    public function getDaemonName(): string
    {
        return $this->getAttribute('daemon_name');
    }

    public function setDaemonName(string $daemonName): self
    {
        $this->setAttribute('daemon_name', $daemonName);
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

    public function getValue(): int
    {
        return $this->getAttribute('value');
    }

    public function setValue(int $value): self
    {
        $this->setAttribute('value', $value);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            daemonName: Arr::get($data, 'daemon_name'),
            nodeHostname: Arr::get($data, 'node_hostname'),
            timestamp: Arr::get($data, 'timestamp'),
            value: Arr::get($data, 'value'),
        ));
    }
}
