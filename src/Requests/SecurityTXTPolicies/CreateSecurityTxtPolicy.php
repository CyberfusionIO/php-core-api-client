<?php

namespace Cyberfusion\CoreApi\Requests\SecurityTXTPolicies;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\SecurityTXTPolicyCreateRequest;
use Cyberfusion\CoreApi\Models\SecurityTXTPolicyResource;
use Cyberfusion\CoreApi\Support\UrlBuilder;
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
        private readonly SecurityTXTPolicyCreateRequest $securityTXTPolicyCreateRequest,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return UrlBuilder::for('/api/v1/security-txt-policies')->getEndpoint();
    }

    public function defaultBody(): array
    {
        return $this->securityTXTPolicyCreateRequest->toArray();
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
