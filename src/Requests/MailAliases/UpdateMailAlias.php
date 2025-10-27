<?php

namespace Cyberfusion\CoreApi\Requests\MailAliases;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\MailAliasResource;
use Cyberfusion\CoreApi\Models\MailAliasUpdateRequest;
use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class UpdateMailAlias extends Request implements CoreApiRequestContract, HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PATCH;

    public function __construct(
        private readonly int $id,
        private readonly MailAliasUpdateRequest $mailAliasUpdateRequest,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return sprintf('/api/v1/mail-aliases/%d', $this->id);
    }

    public function defaultBody(): array
    {
        return $this->mailAliasUpdateRequest->toArray();
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
