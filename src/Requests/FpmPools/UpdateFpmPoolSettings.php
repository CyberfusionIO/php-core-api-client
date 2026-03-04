<?php

namespace Cyberfusion\CoreApi\Requests\FpmPools;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\FpmPoolResource;
use Cyberfusion\CoreApi\Models\FpmPoolUpdateSettingsRequest;
use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class UpdateFpmPoolSettings extends Request implements CoreApiRequestContract, HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PATCH;

    public function __construct(
        private readonly int $id,
        private readonly FpmPoolUpdateSettingsRequest $fpmPoolUpdateSettingsRequest,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return sprintf('/api/v1/fpm-pools/%d/settings', $this->id);
    }

    public function defaultBody(): array
    {
        return $this->fpmPoolUpdateSettingsRequest->toArray();
    }

    /**
     * @throws JsonException
     * @returns FpmPoolResource
     */
    public function createDtoFromResponse(Response $response): FpmPoolResource
    {
        return FpmPoolResource::fromArray($response->json());
    }
}
