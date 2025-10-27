<?php

namespace Cyberfusion\CoreApi\Requests\MailHostnames;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\MailHostnameResource;
use Cyberfusion\CoreApi\Models\MailHostnameUpdateRequest;
use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class UpdateMailHostname extends Request implements CoreApiRequestContract, HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PATCH;

    public function __construct(
        private readonly int $id,
        private readonly MailHostnameUpdateRequest $mailHostnameUpdateRequest,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return sprintf('/api/v1/mail-hostnames/%d', $this->id);
    }

    public function defaultBody(): array
    {
        return $this->mailHostnameUpdateRequest->toArray();
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
