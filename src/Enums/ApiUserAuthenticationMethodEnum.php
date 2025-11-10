<?php

namespace Cyberfusion\CoreApi\Enums;

enum ApiUserAuthenticationMethodEnum: string
{
    case APIKey = 'API Key';
    case JWTToken = 'JWT Token';
}
