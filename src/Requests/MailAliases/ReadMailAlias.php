<?php

namespace Cyberfusion\CoreApi\Requests\MailAliases;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\MailAliasResource;
use JsonException;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class ReadMailAlias extends Request implements CoreApiRequestContract
{
    protected Method $method = Method::GET;

    public function __construct(
        private readonly int $id,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return sprintf('/api/v1/mail-aliases/%d', $this->id);
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
