<?php

namespace Cyberfusion\CoreApi\Requests\Clusters;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\CoreApiUnauthenticated;
use Cyberfusion\CoreApi\Models\ClustersCommonProperties;
use JsonException;
use Saloon\Contracts\Authenticator;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class GetCommonProperties extends Request implements CoreApiRequestContract
{
    protected Method $method = Method::GET;

    public function __construct()
    {
    }

    public function resolveEndpoint(): string
    {
        return '/api/v1/clusters/common-properties';
    }

    public function defaultAuth(): ?Authenticator
    {
        return new CoreApiUnauthenticated();
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
