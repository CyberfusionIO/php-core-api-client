<?php

namespace Cyberfusion\CoreApi\Requests\FPMPools;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\TaskCollectionResource;
use Cyberfusion\CoreApi\Support\UrlBuilder;
use JsonException;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

/**
 * > ℹ️ You usually do not have to call this endpoint. In traditional hosting environments, reloading/restarting the FPM pool is needed when using symlink deployments (symlinking the virtual host document root such as `current`, to a release such as `releases/17`). On clusters however, this happens automatically when a symlink update is detected. In very rare cases, a symlink update cannot be detected, in which case either the reload or restart endpoint must be called manually. This call performs a semi-graceful reload of the FPM pool. Instead of instantly killing all running requests with a 502 Bad Gateway error, which is the behaviour of a restart, running requests will attempt to finish. New requests that come in while waiting for running requests to finish will be queued, instead of returning a 503 Service Unavailable error. If running requests do not finish within a few seconds, they will be killed with a 502 Bad Gateway and/or 503 Service Unavailable error nonetheless.
 */
class ReloadFPMPool extends Request implements CoreApiRequestContract
{
    protected Method $method = Method::POST;

    public function __construct(
        private readonly int $id,
        private readonly ?string $callbackUrl = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return UrlBuilder::for('/api/v1/fpm-pools/%d/reload')
            ->addPathParameter($this->id)
            ->addQueryParameter('callback_url', $this->callbackUrl)
            ->getEndpoint();
    }

    /**
     * @throws JsonException
     * @returns TaskCollectionResource
     */
    public function createDtoFromResponse(Response $response): TaskCollectionResource
    {
        return TaskCollectionResource::fromArray($response->json());
    }
}
