<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class CustomConfigUpdateRequest extends CoreApiModel implements CoreApiModelContract
{
    public function __construct()
    {
    }

    public function getContents(): string|null
    {
        return $this->getAttribute('contents');
    }

    public function setContents(?string $contents): self
    {
        $this->setAttribute('contents', $contents);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
        ))
            ->setContents(Arr::get($data, 'contents'));
    }
}
