<?php

namespace Cyberfusion\CoreApi\Contracts;

interface CoreApiModelContract
{
    public static function fromArray(array $data): CoreApiModelContract;

    public function toArray(): array;
}
