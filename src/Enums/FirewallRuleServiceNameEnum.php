<?php

namespace Cyberfusion\CoreApi\Enums;

enum FirewallRuleServiceNameEnum: string
{
    case SSH = 'SSH';
    case ProFTPD = 'ProFTPD';
    case Nginx = 'nginx';
    case Apache = 'Apache';
}
