<?php

namespace Cyberfusion\CoreApi\Requests\MailAliases;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\MailAliasCreateRequest;
use Cyberfusion\CoreApi\Models\MailAliasResource;
use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class CreateMailAlias extends Request implements CoreApiRequestContract, HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        private readonly MailAliasCreateRequest $mailAliasCreateRequest,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/v1/mail-aliases';
    }

    public function defaultBody(): array
    {
        return $this->mailAliasCreateRequest->toArray();
    }

    /**
     * @throws JsonException
     * @returns MailAliasResource
     */
    public function createDtoFromResponse(Response $response): MailAliasResource
    {
        return MailAliasResource::fromArray($response->json());
    }
}
