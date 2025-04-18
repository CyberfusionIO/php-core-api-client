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

    public function getContents(): string
    {
        return $this->getAttribute('contents');
    }

    /**
     * @throws ValidationException
     */
    public function setContents(string $contents): self
    {
        Validator::optional(Validator::create()
            ->length(min: 1, max: 65535)
            ->regex('/^[ -~\n]+$/'))
            ->assert($contents);
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
