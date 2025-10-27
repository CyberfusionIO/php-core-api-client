<?php

namespace Cyberfusion\CoreApi\Requests\CustomConfigs;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\CustomConfigResource;
use Cyberfusion\CoreApi\Models\CustomConfigUpdateRequest;
use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class UpdateCustomConfig extends Request implements CoreApiRequestContract, HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PATCH;

    public function __construct(
        private readonly int $id,
        private readonly CustomConfigUpdateRequest $customConfigUpdateRequest,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return sprintf('/api/v1/custom-configs/%d', $this->id);
    }

    public function defaultBody(): array
    {
        return $this->customConfigUpdateRequest->toArray();
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
