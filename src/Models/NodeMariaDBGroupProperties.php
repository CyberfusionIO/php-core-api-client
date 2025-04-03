<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class NodeMariaDBGroupProperties extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(bool $isMaster)
    {
        $this->setIsMaster($isMaster);
    }

    public function getIsMaster(): bool
    {
        return $this->getAttribute('is_master');
    }

    public function setIsMaster(?bool $isMaster = null): self
    {
        $this->setAttribute('is_master', $isMaster);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            isMaster: Arr::get($data, 'is_master'),
        ));
    }
}
