<?php

namespace Cyberfusion\CoreApi\Enums;

enum HttpRetryConditionEnum: string
{
    case ConnectionFailure = 'Connection failure';
    case EmptyResponse = 'Empty response';
    case JunkResponse = 'Junk response';
    case ResponseTimeout = 'Response timeout';
    case ZeroRTTRejected = '0-RTT rejected';
    case HTTPStatus401 = 'HTTP status 401';
    case HTTPStatus403 = 'HTTP status 403';
    case HTTPStatus404 = 'HTTP status 404';
    case HTTPStatus408 = 'HTTP status 408';
    case HTTPStatus425 = 'HTTP status 425';
    case HTTPStatus500 = 'HTTP status 500';
    case HTTPStatus501 = 'HTTP status 501';
    case HTTPStatus502 = 'HTTP status 502';
    case HTTPStatus503 = 'HTTP status 503';
    case HTTPStatus504 = 'HTTP status 504';
}
