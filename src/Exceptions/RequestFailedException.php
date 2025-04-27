<?php

namespace Cyberfusion\CoreApi\Exceptions;

use Cyberfusion\CoreApi\Models\DetailMessage;
use Saloon\Http\Response;
use Throwable;

class RequestFailedException extends CoreApiException
{
    public function __construct(
        public Response $response,
        public ?DetailMessage $detailMessage = null,
        ?Throwable $previous = null,
    ) {
        parent::__construct(
            message: sprintf('Request failed with status code %d', $response->status()),
            code: $response->status(),
            previous: $previous,
        );
    }
}
