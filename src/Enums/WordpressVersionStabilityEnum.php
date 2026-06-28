<?php

namespace Cyberfusion\CoreApi\Enums;

enum WordpressVersionStabilityEnum: string
{
    case Latest = 'latest';
    case Outdated = 'outdated';
    case Insecure = 'insecure';
}
