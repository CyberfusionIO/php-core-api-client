<?php

namespace Cyberfusion\CoreApi\Requests\CustomConfigs;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\CustomConfigResource;
use Cyberfusion\CoreApi\Models\CustomConfigUpdateRequest;
use Cyberfusion\CoreApi\Models\DetailMessage;
use Cyberfusion\CoreApi\Models\ValidationError;
use Cyberfusion\CoreApi\Support\DtoBuilder;
use Cyberfusion\CoreApi\Support\UrlBuilder;
use Illuminate\Support\Collection;
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
        return UrlBuilder::for('/api/v1/custom-configs/%d')
            ->addPathParameter($this->id)
            ->getEndpoint();
    }

    public function defaultBody(): array
    {
        return $this->customConfigUpdateRequest->toArray();
    }

    /**
     * @throws JsonException
     * @returns CustomConfigResource|DetailMessage|Collection<ValidationError>
     */
    public function createDtoFromResponse(Response $response): CustomConfigResource|DetailMessage|Collection
    {
        return DtoBuilder::for($response, CustomConfigResource::class)->build();
    }
}
