<?php

namespace Cyberfusion\CoreApi\Enums;

enum HostEnum: string
{
    case All = '%';
    case Localhost = '::1';
}
