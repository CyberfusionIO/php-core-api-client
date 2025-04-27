<?php

namespace Cyberfusion\CoreApi\Requests\MailAliases;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\MailAliasResource;
use Cyberfusion\CoreApi\Models\MailAliasUpdateDeprecatedRequest;
use Cyberfusion\CoreApi\Support\UrlBuilder;
use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

/**
 * The following properties can never be updated to a different value: * `local_part` * `mail_domain_id`
 */
class DeprecatedUpdateMailAlias extends Request implements CoreApiRequestContract, HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;

    public function __construct(
        private readonly int $id,
        private readonly MailAliasUpdateDeprecatedRequest $mailAliasUpdateDeprecatedRequest,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return UrlBuilder::for('/api/v1/mail-aliases/%d')
            ->addPathParameter($this->id)
            ->getEndpoint();
    }

    public function defaultBody(): array
    {
        return $this->mailAliasUpdateDeprecatedRequest->toArray();
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
