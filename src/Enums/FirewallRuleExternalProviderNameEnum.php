<?php

namespace Cyberfusion\CoreApi\Enums;

enum FirewallRuleExternalProviderNameEnum: string
{
    case Atlassian = 'Atlassian';
    case AWS = 'AWS';
    case Buddy = 'Buddy';
    case GoogleCloud = 'Google Cloud';
}
