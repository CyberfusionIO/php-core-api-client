<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class DetailMessage extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(string $detail)
    {
        $this->setDetail($detail);
    }

    public function getDetail(): string
    {
        return $this->getAttribute('detail');
    }

    /**
     * @throws ValidationException
     */
    public function setDetail(?string $detail = null): self
    {
        Validator::create()
            ->length(min: 1, max: 255)
            ->regex('/^[ -~]+$/')
            ->assert($detail);
        $this->setAttribute('detail', $detail);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            detail: Arr::get($data, 'detail'),
        ));
    }
}
