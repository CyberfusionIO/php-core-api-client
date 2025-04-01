<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class TombstoneDataCertificate extends CoreApiModel implements CoreApiModelContract
{
    public function __construct()
    {
    }

    public function getDataType(): string
    {
        return $this->getAttribute('dataType');
    }

    public function setDataType(string $dataType): self
    {
        $this->setAttribute('dataType', $dataType);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
        ))
            ->setDataType(Arr::get($data, 'data_type'));
    }
}
