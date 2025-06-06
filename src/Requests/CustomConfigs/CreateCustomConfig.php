<?php

namespace Cyberfusion\CoreApi\Requests\CustomConfigs;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\CustomConfigCreateRequest;
use Cyberfusion\CoreApi\Models\CustomConfigResource;
use Cyberfusion\CoreApi\Support\UrlBuilder;
use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Compatible cluster groups: * Web The following combinations of attributes are unique: - `name` + `cluster_id`
 */
class CreateCustomConfig extends Request implements CoreApiRequestContract, HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        private readonly CustomConfigCreateRequest $customConfigCreateRequest,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return UrlBuilder::for('/api/v1/custom-configs')->getEndpoint();
    }

    public function defaultBody(): array
    {
        return $this->customConfigCreateRequest->toArray();
    }

    /**
     * @throws JsonException
     * @returns CustomConfigResource
     */
    public function createDtoFromResponse(Response $response): CustomConfigResource
    {
        return CustomConfigResource::fromArray($response->json());
    }
}
