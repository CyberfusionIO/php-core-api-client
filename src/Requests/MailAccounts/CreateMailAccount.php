<?php

namespace Cyberfusion\CoreApi\Requests\MailAccounts;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\MailAccountCreateRequest;
use Cyberfusion\CoreApi\Models\MailAccountResource;
use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class CreateMailAccount extends Request implements CoreApiRequestContract, HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        private readonly MailAccountCreateRequest $mailAccountCreateRequest,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/v1/mail-accounts';
    }

    public function defaultBody(): array
    {
        return $this->mailAccountCreateRequest->toArray();
    }

    /**
     * @throws JsonException
     * @returns MailAccountResource
     */
    public function createDtoFromResponse(Response $response): MailAccountResource
    {
        return MailAccountResource::fromArray($response->json());
    }
}
