<?php

namespace Cyberfusion\CoreApi\Exceptions;

use Cyberfusion\CoreApi\Models\ValidationError;
use Illuminate\Support\Collection;
use Saloon\Http\Response;
use Throwable;

class RequestValidationException extends CoreApiException
{
    /**
     * @param Collection<ValidationError> $errors
     */
    public function __construct(
        public Response $response,
        public Collection $errors,
        ?Throwable $previous = null
    ) {
        parent::__construct(
            message: 'Request failed due to validation',
            code: $response->status(),
            previous: $previous,
        );
    }
}
