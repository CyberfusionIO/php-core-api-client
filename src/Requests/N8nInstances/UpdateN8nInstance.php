<?php

namespace Cyberfusion\CoreApi\Requests\N8nInstances;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\N8nInstanceResource;
use Cyberfusion\CoreApi\Models\N8nInstanceUpdateRequest;
use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class UpdateN8nInstance extends Request implements CoreApiRequestContract, HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PATCH;

    public function __construct(
        private readonly int $id,
        private readonly N8nInstanceUpdateRequest $n8nInstanceUpdateRequest,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return sprintf('/api/v1/n8n-instances/%d', $this->id);
    }

    public function defaultBody(): array
    {
        return $this->n8nInstanceUpdateRequest->toArray();
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
