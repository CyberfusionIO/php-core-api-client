<?php

namespace Cyberfusion\CoreApi\Requests\SecurityTxtPolicies;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\SecurityTxtPolicyResource;
use Cyberfusion\CoreApi\Models\SecurityTxtPolicyUpdateRequest;
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
        private readonly SecurityTxtPolicyUpdateRequest $securityTxtPolicyUpdateRequest,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return sprintf('/api/v1/security-txt-policies/%d', $this->id);
    }

    public function defaultBody(): array
    {
        return $this->securityTxtPolicyUpdateRequest->toArray();
    }

    /**
     * @throws JsonException
     * @returns SecurityTxtPolicyResource
     */
    public function createDtoFromResponse(Response $response): SecurityTxtPolicyResource
    {
        return SecurityTxtPolicyResource::fromArray($response->json());
    }
}
