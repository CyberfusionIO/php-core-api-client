<?php

namespace Cyberfusion\CoreApi\Requests\Health;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\CoreApiUnauthenticated;
use Cyberfusion\CoreApi\Models\HealthResource;
use JsonException;
use Saloon\Contracts\Authenticator;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

/**
 * - If the `health` status is `up`, the API may be used. - If the `health` status is `maintenance`, the API may be functioning in a degraded state. In this case, we do not recommend using the API.
 */
class ReadHealth extends Request implements CoreApiRequestContract
{
    protected Method $method = Method::GET;

    public function __construct()
    {
    }

    public function resolveEndpoint(): string
    {
        return '/api/v1/health';
    }

    public function defaultAuth(): ?Authenticator
    {
        return new CoreApiUnauthenticated();
    }

    /**
     * @throws JsonException
     * @returns HealthResource
     */
    public function createDtoFromResponse(Response $response): HealthResource
    {
        return HealthResource::fromArray($response->json());
    }
}
