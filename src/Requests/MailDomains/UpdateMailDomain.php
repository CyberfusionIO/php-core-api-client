<?php

namespace Cyberfusion\CoreApi\Requests\MailDomains;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\DetailMessage;
use Cyberfusion\CoreApi\Models\MailDomainResource;
use Cyberfusion\CoreApi\Models\MailDomainUpdateRequest;
use Cyberfusion\CoreApi\Models\ValidationError;
use Cyberfusion\CoreApi\Support\DtoBuilder;
use Cyberfusion\CoreApi\Support\UrlBuilder;
use Illuminate\Support\Collection;
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
     * @returns MailDomainResource|DetailMessage|Collection<ValidationError>
     */
    public function createDtoFromResponse(Response $response): MailDomainResource|DetailMessage|Collection
    {
        return DtoBuilder::for($response, MailDomainResource::class)->build();
    }
}
