<?php

namespace Cyberfusion\CoreApi\Requests\N8nInstances;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\N8nInstanceCreateRequest;
use Cyberfusion\CoreApi\Models\N8nInstanceResource;
use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class CreateN8nInstance extends Request implements CoreApiRequestContract, HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        private readonly N8nInstanceCreateRequest $n8nInstanceCreateRequest,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/v1/n8n-instances';
    }

    public function defaultBody(): array
    {
        return $this->n8nInstanceCreateRequest->toArray();
    }

    /**
     * @throws JsonException
     * @returns N8nInstanceResource
     */
    public function createDtoFromResponse(Response $response): N8nInstanceResource
    {
        return N8nInstanceResource::fromArray($response->json());
    }
}
