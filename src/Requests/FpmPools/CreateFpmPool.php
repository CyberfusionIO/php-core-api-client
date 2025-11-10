<?php

namespace Cyberfusion\CoreApi\Requests\FpmPools;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\FpmPoolCreateRequest;
use Cyberfusion\CoreApi\Models\FpmPoolResource;
use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

/**
 * The following combinations of attributes are unique: - `name`
 */
class CreateFpmPool extends Request implements CoreApiRequestContract, HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        private readonly FpmPoolCreateRequest $fpmPoolCreateRequest,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/v1/fpm-pools';
    }

    public function defaultBody(): array
    {
        return $this->fpmPoolCreateRequest->toArray();
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
