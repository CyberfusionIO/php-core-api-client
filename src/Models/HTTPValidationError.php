<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class HTTPValidationError extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function getDetail(): array
    {
        return $this->getAttribute('detail');
    }

    public function setDetail(array $detail): self
    {
        $this->setAttribute('detail', $detail);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
        ))
            ->when(Arr::has($data, 'detail'), fn (self $model) => $model->setDetail(Arr::get($data, 'detail')));
    }
}
