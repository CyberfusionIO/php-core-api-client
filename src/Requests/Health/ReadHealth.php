<?php

namespace Cyberfusion\CoreApi\Requests\Health;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\HealthResource;
use Cyberfusion\CoreApi\Support\UrlBuilder;
use JsonException;
use Saloon\Enums\Method;
use Saloon\Http\Response;
use Saloon\Http\SoloRequest;

/**
 * - If the `health` status is `up`, the API may be used. - If the `health` status is `maintenance`, the API may be functioning in a degraded state. In this case, we do not recommend using the API.
 */
class ReadHealth extends SoloRequest implements CoreApiRequestContract
{
    protected Method $method = Method::GET;

    public function __construct(
        private readonly string $baseUrl,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return UrlBuilder::for($this->baseUrl . '/api/v1/health')->getEndpoint();
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
