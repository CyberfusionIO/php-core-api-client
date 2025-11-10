<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class UnixUsersHomeDirectoryUsageResource extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function __construct(
        int $clusterId,
        float $usage,
        string $timestamp,
        UnixUsersHomeDirectoryUsageIncludes $includes,
    ) {
        $this->setClusterId($clusterId);
        $this->setUsage($usage);
        $this->setTimestamp($timestamp);
        $this->setIncludes($includes);
    }

    public function getClusterId(): int
    {
        return $this->getAttribute('cluster_id');
    }

    public function setClusterId(int $clusterId): self
    {
        $this->setAttribute('cluster_id', $clusterId);
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

    public function getIncludes(): UnixUsersHomeDirectoryUsageIncludes
    {
        return $this->getAttribute('includes');
    }

    public function setIncludes(UnixUsersHomeDirectoryUsageIncludes $includes): self
    {
        $this->setAttribute('includes', $includes);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            clusterId: Arr::get($data, 'cluster_id'),
            usage: Arr::get($data, 'usage'),
            timestamp: Arr::get($data, 'timestamp'),
            includes: UnixUsersHomeDirectoryUsageIncludes::fromArray(Arr::get($data, 'includes')),
        ));
    }
}
