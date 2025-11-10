<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class UnixUserUsageResource extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function __construct(
        int $unixUserId,
        float $usage,
        string $timestamp,
        UnixUserUsageIncludes $includes,
        ?array $files = null,
    ) {
        $this->setUnixUserId($unixUserId);
        $this->setUsage($usage);
        $this->setTimestamp($timestamp);
        $this->setIncludes($includes);
        $this->setFiles($files);
    }

    public function getUnixUserId(): int
    {
        return $this->getAttribute('unix_user_id');
    }

    public function setUnixUserId(int $unixUserId): self
    {
        $this->setAttribute('unix_user_id', $unixUserId);
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

    public function getFiles(): array|null
    {
        return $this->getAttribute('files');
    }

    public function setFiles(?array $files): self
    {
        $this->setAttribute('files', $files);
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

    public function getIncludes(): UnixUserUsageIncludes
    {
        return $this->getAttribute('includes');
    }

    public function setIncludes(UnixUserUsageIncludes $includes): self
    {
        $this->setAttribute('includes', $includes);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            unixUserId: Arr::get($data, 'unix_user_id'),
            usage: Arr::get($data, 'usage'),
            timestamp: Arr::get($data, 'timestamp'),
            includes: UnixUserUsageIncludes::fromArray(Arr::get($data, 'includes')),
            files: Arr::get($data, 'files'),
        ));
    }
}
