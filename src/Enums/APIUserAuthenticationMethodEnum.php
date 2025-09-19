<?php

namespace Cyberfusion\CoreApi\Enums;

enum APIUserAuthenticationMethodEnum: string
{
    case APIKey = 'API Key';
    case JWTToken = 'JWT Token';
}
