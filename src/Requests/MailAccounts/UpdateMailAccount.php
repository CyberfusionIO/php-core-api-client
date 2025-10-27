<?php

namespace Cyberfusion\CoreApi\Requests\MailAccounts;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\MailAccountResource;
use Cyberfusion\CoreApi\Models\MailAccountUpdateRequest;
use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class UpdateMailAccount extends Request implements CoreApiRequestContract, HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PATCH;

    public function __construct(
        private readonly int $id,
        private readonly MailAccountUpdateRequest $mailAccountUpdateRequest,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return sprintf('/api/v1/mail-accounts/%d', $this->id);
    }

    public function defaultBody(): array
    {
        return $this->mailAccountUpdateRequest->toArray();
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
