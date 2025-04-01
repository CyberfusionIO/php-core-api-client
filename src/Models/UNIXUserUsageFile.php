<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class UNIXUserUsageFile extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(string $path, string $size)
    {
        $this->setPath($path);
        $this->setSize($size);
    }

    public function getPath(): string
    {
        return $this->getAttribute('path');
    }

    public function setPath(?string $path = null): self
    {
        $this->setAttribute('path', $path);
        return $this;
    }

    public function getSize(): string
    {
        return $this->getAttribute('size');
    }

    public function setSize(?string $size = null): self
    {
        $this->setAttribute('size', $size);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            path: Arr::get($data, 'path'),
            size: Arr::get($data, 'size'),
        ));
    }
}
