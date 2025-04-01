<?php

namespace Cyberfusion\CoreApi\Enums;

enum LogMethodEnum: string
{
    case GET = 'GET';
    case POST = 'POST';
    case PUT = 'PUT';
    case PATCH = 'PATCH';
    case OPTIONS = 'OPTIONS';
    case DELETE = 'DELETE';
    case HEAD = 'HEAD';
}
