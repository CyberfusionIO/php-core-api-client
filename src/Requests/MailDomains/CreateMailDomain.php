<?php

namespace Cyberfusion\CoreApi\Requests\MailDomains;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\MailDomainCreateRequest;
use Cyberfusion\CoreApi\Models\MailDomainResource;
use Cyberfusion\CoreApi\Support\UrlBuilder;
use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Compatible cluster groups: * Mail The following combinations of attributes are unique: - `domain`
 */
class CreateMailDomain extends Request implements CoreApiRequestContract, HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        private readonly MailDomainCreateRequest $mailDomainCreateRequest,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return UrlBuilder::for('/api/v1/mail-domains')->getEndpoint();
    }

    public function defaultBody(): array
    {
        return $this->mailDomainCreateRequest->toArray();
    }

    /**
     * @throws JsonException
     * @returns MailDomainResource
     */
    public function createDtoFromResponse(Response $response): MailDomainResource
    {
        return MailDomainResource::fromArray($response->json());
    }
}
