<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class ClusterRedisPropertiesCreateRequest extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function __construct(string $redisPassword, int $redisMemoryLimit)
    {
        $this->setRedisPassword($redisPassword);
        $this->setRedisMemoryLimit($redisMemoryLimit);
    }

    public function getRedisPassword(): string
    {
        return $this->getAttribute('redis_password');
    }

    /**
     * @throws ValidationException
     */
    public function setRedisPassword(string $redisPassword): self
    {
        Validator::create()
            ->length(min: 24, max: 255)
            ->regex('/^[a-zA-Z0-9]+$/')
            ->assert($redisPassword);
        $this->setAttribute('redis_password', $redisPassword);
        return $this;
    }

    public function getRedisMemoryLimit(): int
    {
        return $this->getAttribute('redis_memory_limit');
    }

    public function setRedisMemoryLimit(int $redisMemoryLimit): self
    {
        $this->setAttribute('redis_memory_limit', $redisMemoryLimit);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            redisPassword: Arr::get($data, 'redis_password'),
            redisMemoryLimit: Arr::get($data, 'redis_memory_limit'),
        ));
    }
}
