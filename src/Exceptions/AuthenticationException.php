<?php

namespace Cyberfusion\CoreApi\Exceptions;

use Cyberfusion\CoreApi\Models\DetailMessage;
use Cyberfusion\CoreApi\Models\ValidationError;
use Throwable;

class AuthenticationException extends CoreApiException
{
    public function __construct(ValidationError|DetailMessage $result, ?Throwable $previous = null)
    {
        parent::__construct(
            message: $result instanceof ValidationError
                ? 'The authentication request is invalid, please provide at least a username and password.'
                : $result->getDetail(),
            previous: $previous
        );
    }
}
