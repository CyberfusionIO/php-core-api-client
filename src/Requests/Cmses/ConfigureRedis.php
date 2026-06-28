<?php

namespace Cyberfusion\CoreApi\Requests\Cmses;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\CmsConfigureRedisRequest;
use Cyberfusion\CoreApi\Models\TaskCollectionResource;
use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Create and configure a Redis instance for a WordPress CMS. The cluster must have exactly one PHP node, and that node must also have the Redis group. The host is always 'localhost' because there is no reliable way of determining how else the Redis instance may be accessible (e.g. via HAProxy Listen or Hosts Entry). The configuration is done on a PHP node, so Redis must be on that node too (because localhost). The cluster may only have one PHP/Redis node, because if we run on a PHP node that does have Redis but Redis is not master on that node, configuration would fail — writes to replicas are not allowed.
 */
class ConfigureRedis extends Request implements CoreApiRequestContract, HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        private readonly int $id,
        private readonly CmsConfigureRedisRequest $cmsConfigureRedisRequest,
        private readonly ?string $callbackUrl = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return sprintf('/api/v1/cmses/%d/configure/redis', $this->id);
    }

    protected function defaultQuery(): array
    {
        $parameters = [];
        $parameters['callback_url'] = $this->callbackUrl;

        return array_filter($parameters);
    }

    public function defaultBody(): array
    {
        return $this->cmsConfigureRedisRequest->toArray();
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
