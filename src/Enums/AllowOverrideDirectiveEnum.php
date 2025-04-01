<?php

namespace Cyberfusion\CoreApi\Enums;

enum AllowOverrideDirectiveEnum: string
{
    case All = 'All';
    case AuthConfig = 'AuthConfig';
    case FileInfo = 'FileInfo';
    case Indexes = 'Indexes';
    case Limit = 'Limit';
    case None = 'None';
}
