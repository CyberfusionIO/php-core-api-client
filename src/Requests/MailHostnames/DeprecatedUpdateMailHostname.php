<?php

namespace Cyberfusion\CoreApi\Requests\MailHostnames;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\MailHostnameResource;
use Cyberfusion\CoreApi\Models\MailHostnameUpdateDeprecatedRequest;
use Cyberfusion\CoreApi\Support\UrlBuilder;
use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

/**
 * The following properties can never be updated to a different value: * `domain`
 */
class DeprecatedUpdateMailHostname extends Request implements CoreApiRequestContract, HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;

    public function __construct(
        private readonly int $id,
        private readonly MailHostnameUpdateDeprecatedRequest $mailHostnameUpdateDeprecatedRequest,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return UrlBuilder::for('/api/v1/mail-hostnames/%d')
            ->addPathParameter($this->id)
            ->getEndpoint();
    }

    public function defaultBody(): array
    {
        return $this->mailHostnameUpdateDeprecatedRequest->toArray();
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
