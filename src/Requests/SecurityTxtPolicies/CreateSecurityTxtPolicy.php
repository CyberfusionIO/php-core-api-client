<?php

namespace Cyberfusion\CoreApi\Requests\SecurityTxtPolicies;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\SecurityTxtPolicyCreateRequest;
use Cyberfusion\CoreApi\Models\SecurityTxtPolicyResource;
use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

/**
 * For more information about security.txt as well as the format, see https://securitytxt.org/.
 */
class CreateSecurityTxtPolicy extends Request implements CoreApiRequestContract, HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        private readonly SecurityTxtPolicyCreateRequest $securityTxtPolicyCreateRequest,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/v1/security-txt-policies';
    }

    public function defaultBody(): array
    {
        return $this->securityTxtPolicyCreateRequest->toArray();
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
