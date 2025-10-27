<?php

namespace Cyberfusion\CoreApi\Requests\MailDomains;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\MailDomainResource;
use JsonException;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class ReadMailDomain extends Request implements CoreApiRequestContract
{
    protected Method $method = Method::GET;

    public function __construct(
        private readonly int $id,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return sprintf('/api/v1/mail-domains/%d', $this->id);
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
