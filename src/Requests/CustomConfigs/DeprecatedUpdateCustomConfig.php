<?php

namespace Cyberfusion\CoreApi\Requests\CustomConfigs;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\CustomConfigResource;
use Cyberfusion\CoreApi\Models\CustomConfigUpdateDeprecatedRequest;
use Cyberfusion\CoreApi\Support\UrlBuilder;
use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

/**
 * The following properties can never be updated to a different value: * `name` * `server_software_name`
 */
class DeprecatedUpdateCustomConfig extends Request implements CoreApiRequestContract, HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;

    public function __construct(
        private readonly int $id,
        private readonly CustomConfigUpdateDeprecatedRequest $customConfigUpdateDeprecatedRequest,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return UrlBuilder::for('/api/v1/custom-configs/%d')
            ->addPathParameter($this->id)
            ->getEndpoint();
    }

    public function defaultBody(): array
    {
        return $this->customConfigUpdateDeprecatedRequest->toArray();
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
