<?php

namespace Cyberfusion\CoreApi;

use Saloon\Contracts\Authenticator;
use Saloon\Http\PendingRequest;

/**
 * An authenticator for Core API requests to remove the default authentication.
 */
class CoreApiUnauthenticated implements Authenticator
{
    public function set(PendingRequest $pendingRequest): void
    {

    }
}
