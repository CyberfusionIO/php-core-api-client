<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class UNIXUsersHomeDirectoryUsageResource extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(int $clusterId, string $usage, string $timestamp)
    {
        $this->setClusterId($clusterId);
        $this->setUsage($usage);
        $this->setTimestamp($timestamp);
    }

    public function getClusterId(): int
    {
        return $this->getAttribute('clusterId');
    }

    public function setClusterId(?int $clusterId = null): self
    {
        $this->setAttribute('cluster_id', $clusterId);
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
            clusterId: Arr::get($data, 'cluster_id'),
            usage: Arr::get($data, 'usage'),
            timestamp: Arr::get($data, 'timestamp'),
        ));
    }
}
