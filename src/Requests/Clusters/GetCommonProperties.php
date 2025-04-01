<?php

namespace Cyberfusion\CoreApi\Requests\Clusters;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\ClustersCommonProperties;
use Cyberfusion\CoreApi\Models\DetailMessage;
use Cyberfusion\CoreApi\Models\ValidationError;
use Cyberfusion\CoreApi\Support\DtoBuilder;
use Cyberfusion\CoreApi\Support\UrlBuilder;
use Illuminate\Support\Collection;
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
     * @returns ClustersCommonProperties|DetailMessage|Collection<ValidationError>
     */
    public function createDtoFromResponse(Response $response): ClustersCommonProperties|DetailMessage|Collection
    {
        return DtoBuilder::for($response, ClustersCommonProperties::class)->build();
    }
}
