<?php

namespace Cyberfusion\CoreApi\Requests\Clusters;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\ClustersCommonProperties;
use Cyberfusion\CoreApi\Support\UrlBuilder;
use JsonException;
use Saloon\Enums\Method;
use Saloon\Http\Response;
use Saloon\Http\SoloRequest;

/**
 * Get clusters common properties.
 */
class GetCommonProperties extends SoloRequest implements CoreApiRequestContract
{
    protected Method $method = Method::GET;

    public function __construct(
        private readonly string $baseUrl,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return UrlBuilder::for($this->baseUrl . '/api/v1/clusters/common-properties')->getEndpoint();
    }

    /**
     * @throws JsonException
     * @returns ClustersCommonProperties
     */
    public function createDtoFromResponse(Response $response): ClustersCommonProperties
    {
        return ClustersCommonProperties::fromArray($response->json());
    }
}
