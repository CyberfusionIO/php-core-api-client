<?php

namespace Cyberfusion\CoreApi\Enums;

enum AllowOverrideOptionDirectiveEnum: string
{
    case All = 'All';
    case FollowSymLinks = 'FollowSymLinks';
    case Indexes = 'Indexes';
    case MultiViews = 'MultiViews';
    case SymLinksIfOwnerMatch = 'SymLinksIfOwnerMatch';
    case None = 'None';
}
