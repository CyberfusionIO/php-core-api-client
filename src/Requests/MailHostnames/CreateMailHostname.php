<?php

namespace Cyberfusion\CoreApi\Requests\MailHostnames;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\MailHostnameCreateRequest;
use Cyberfusion\CoreApi\Models\MailHostnameResource;
use Cyberfusion\CoreApi\Support\UrlBuilder;
use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Compatible cluster groups: * Mail The following combinations of attributes are unique: - `domain`
 */
class CreateMailHostname extends Request implements CoreApiRequestContract, HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        private readonly MailHostnameCreateRequest $mailHostnameCreateRequest,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return UrlBuilder::for('/api/v1/mail-hostnames')->getEndpoint();
    }

    public function defaultBody(): array
    {
        return $this->mailHostnameCreateRequest->toArray();
    }

    /**
     * @throws JsonException
     * @returns MailHostnameResource
     */
    public function createDtoFromResponse(Response $response): MailHostnameResource
    {
        return MailHostnameResource::fromArray($response->json());
    }
}
