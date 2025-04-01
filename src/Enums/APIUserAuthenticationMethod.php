<?php

namespace Cyberfusion\CoreApi\Enums;

enum APIUserAuthenticationMethod: string
{
    case APIKey = 'API Key';
    case JWTToken = 'JWT Token';
}
