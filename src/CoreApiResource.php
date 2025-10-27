<?php

namespace Cyberfusion\CoreApi;

class CoreApiResource
{
    public function __construct(protected readonly CoreApiConnector $connector)
    {
        //
    }
}
