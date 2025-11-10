<?php

namespace Cyberfusion\CoreApi\Requests\FpmPools;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\FpmPoolResource;
use Cyberfusion\CoreApi\Models\FpmPoolUpdateRequest;
use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class UpdateFpmPool extends Request implements CoreApiRequestContract, HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PATCH;

    public function __construct(
        private readonly int $id,
        private readonly FpmPoolUpdateRequest $fpmPoolUpdateRequest,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return sprintf('/api/v1/fpm-pools/%d', $this->id);
    }

    public function defaultBody(): array
    {
        return $this->fpmPoolUpdateRequest->toArray();
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
