<?php

namespace Cyberfusion\CoreApi\Enums;

enum StandardsScanHttpsRedirectEnum: string
{
    case Enforced = 'enforced';
    case NotEnforced = 'not_enforced';
    case HttpNotAvailable = 'http_not_available';
    case HttpsNotAvailable = 'https_not_available';
}
