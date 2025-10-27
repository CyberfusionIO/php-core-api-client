<?php

namespace Cyberfusion\CoreApi\Requests\MailAccounts;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\MailAccountResource;
use JsonException;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class ReadMailAccount extends Request implements CoreApiRequestContract
{
    protected Method $method = Method::GET;

    public function __construct(
        private readonly int $id,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return sprintf('/api/v1/mail-accounts/%d', $this->id);
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
