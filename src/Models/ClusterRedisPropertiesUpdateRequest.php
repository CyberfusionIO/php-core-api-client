<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class ClusterRedisPropertiesUpdateRequest extends CoreApiModel implements CoreApiModelContract
{
    public function __construct()
    {
    }

    public function getRedisPassword(): string|null
    {
        return $this->getAttribute('redis_password');
    }

    public function setRedisPassword(?string $redisPassword): self
    {
        $this->setAttribute('redis_password', $redisPassword);
        return $this;
    }

    public function getRedisMemoryLimit(): int|null
    {
        return $this->getAttribute('redis_memory_limit');
    }

    public function setRedisMemoryLimit(?int $redisMemoryLimit): self
    {
        $this->setAttribute('redis_memory_limit', $redisMemoryLimit);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
        ))
            ->setRedisPassword(Arr::get($data, 'redis_password'))
            ->setRedisMemoryLimit(Arr::get($data, 'redis_memory_limit'));
    }
}
