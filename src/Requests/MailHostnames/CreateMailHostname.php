<?php

namespace Cyberfusion\CoreApi\Requests\MailHostnames;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\DetailMessage;
use Cyberfusion\CoreApi\Models\MailHostnameCreateRequest;
use Cyberfusion\CoreApi\Models\MailHostnameResource;
use Cyberfusion\CoreApi\Models\ValidationError;
use Cyberfusion\CoreApi\Support\DtoBuilder;
use Cyberfusion\CoreApi\Support\UrlBuilder;
use Illuminate\Support\Collection;
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
     * @returns MailHostnameResource|DetailMessage|Collection<ValidationError>
     */
    public function createDtoFromResponse(Response $response): MailHostnameResource|DetailMessage|Collection
    {
        return DtoBuilder::for($response, MailHostnameResource::class)->build();
    }
}
