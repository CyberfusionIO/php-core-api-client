<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class HTTPValidationError extends CoreApiModel implements CoreApiModelContract
{
    public function __construct()
    {
    }

    public function getDetail(): array|null
    {
        return $this->getAttribute('detail');
    }

    public function setDetail(?array $detail): self
    {
        $this->setAttribute('detail', $detail);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
        ))
            ->setDetail(Arr::get($data, 'detail'));
    }
}
