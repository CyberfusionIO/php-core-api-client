<?php

namespace Cyberfusion\CoreApi\Contracts;

interface CoreApiRequestContract
{
    public function resolveEndpoint(): string;
}
