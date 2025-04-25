<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class UNIXUserUsageResource extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(int $unixUserId, float $usage, string $timestamp, ?array $files = null)
    {
        $this->setUnixUserId($unixUserId);
        $this->setUsage($usage);
        $this->setTimestamp($timestamp);
        $this->setFiles($files);
    }

    public function getUnixUserId(): int
    {
        return $this->getAttribute('unix_user_id');
    }

    public function setUnixUserId(?int $unixUserId = null): self
    {
        $this->setAttribute('unix_user_id', $unixUserId);
        return $this;
    }

    public function getUsage(): float
    {
        return $this->getAttribute('usage');
    }

    public function setUsage(?float $usage = null): self
    {
        $this->setAttribute('usage', $usage);
        return $this;
    }

    public function getFiles(): array|null
    {
        return $this->getAttribute('files');
    }

    public function setFiles(?array $files = []): self
    {
        $this->setAttribute('files', $files);
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

    public function getIncludes(): UNIXUserUsageIncludes|null
    {
        return $this->getAttribute('includes');
    }

    public function setIncludes(?UNIXUserUsageIncludes $includes): self
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
            files: Arr::get($data, 'files'),
        ))
            ->setIncludes(Arr::get($data, 'includes') !== null ? UNIXUserUsageIncludes::fromArray(Arr::get($data, 'includes')) : null);
    }
}
