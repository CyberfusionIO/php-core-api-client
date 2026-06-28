<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class CmsConfigureRedisRequest extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function __construct(int $memoryLimit)
    {
        $this->setMemoryLimit($memoryLimit);
    }

    public function getMemoryLimit(): int
    {
        return $this->getAttribute('memory_limit');
    }

    public function setMemoryLimit(int $memoryLimit): self
    {
        $this->setAttribute('memory_limit', $memoryLimit);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            memoryLimit: Arr::get($data, 'memory_limit'),
        ));
    }
}
