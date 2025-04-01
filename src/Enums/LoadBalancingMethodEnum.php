<?php

namespace Cyberfusion\CoreApi\Enums;

enum LoadBalancingMethodEnum: string
{
    case RoundRobin = 'Round Robin';
    case SourceIPAddress = 'Source IP Address';
}
