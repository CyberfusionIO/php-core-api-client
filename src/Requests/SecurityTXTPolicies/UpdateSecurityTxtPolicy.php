<?php

namespace Cyberfusion\CoreApi\Requests\SecurityTXTPolicies;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\SecurityTXTPolicyResource;
use Cyberfusion\CoreApi\Models\SecurityTXTPolicyUpdateRequest;
use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class UpdateSecurityTxtPolicy extends Request implements CoreApiRequestContract, HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PATCH;

    public function __construct(
        private readonly int $id,
        private readonly SecurityTXTPolicyUpdateRequest $securityTXTPolicyUpdateRequest,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return sprintf('/api/v1/security-txt-policies/%d', $this->id);
    }

    public function defaultBody(): array
    {
        return $this->securityTXTPolicyUpdateRequest->toArray();
    }

    /**
     * @throws JsonException
     * @returns SecurityTXTPolicyResource
     */
    public function createDtoFromResponse(Response $response): SecurityTXTPolicyResource
    {
        return SecurityTXTPolicyResource::fromArray($response->json());
    }
}
