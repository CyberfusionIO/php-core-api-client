<?php

namespace Cyberfusion\CoreApi\Enums;

enum TaskStateEnum: string
{
    case Pending = 'pending';
    case Started = 'started';
    case Success = 'success';
    case Failure = 'failure';
    case Retry = 'retry';
    case Revoked = 'revoked';
}
