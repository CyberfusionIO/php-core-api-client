<?php

namespace Cyberfusion\CoreApi\Requests\MailDomains;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\MailDomainResource;
use Cyberfusion\CoreApi\Models\MailDomainUpdateRequest;
use Cyberfusion\CoreApi\Support\UrlBuilder;
use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class UpdateMailDomain extends Request implements CoreApiRequestContract, HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PATCH;

    public function __construct(
        private readonly int $id,
        private readonly MailDomainUpdateRequest $mailDomainUpdateRequest,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return UrlBuilder::for('/api/v1/mail-domains/%d')
            ->addPathParameter($this->id)
            ->getEndpoint();
    }

    public function defaultBody(): array
    {
        return $this->mailDomainUpdateRequest->toArray();
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
