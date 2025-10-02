<?php

namespace Cyberfusion\CoreApi\Exceptions;

use Cyberfusion\CoreApi\Models\DetailMessage;
use Cyberfusion\CoreApi\Models\ValidationError;
use Illuminate\Support\Collection;
use Throwable;

class AuthenticationException extends CoreApiException
{
    /**
     * @param Collection<ValidationError>|DetailMessage $result
     * @param Throwable|null $previous
     */
    public function __construct(Collection|DetailMessage $result, ?Throwable $previous = null)
    {
        parent::__construct(
            message: $result instanceof Collection
                ? 'The authentication request is invalid, please provide at least a username and password.'
                : $result->getDetail(),
            previous: $previous
        );
    }
}
