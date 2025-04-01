<?php

namespace Cyberfusion\CoreApi\Requests\MailAccounts;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\DetailMessage;
use Cyberfusion\CoreApi\Models\MailAccountResource;
use Cyberfusion\CoreApi\Models\MailAccountUpdateRequest;
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

class UpdateMailAccount extends Request implements CoreApiRequestContract, HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PATCH;

    public function __construct(
        private readonly int $id,
        private readonly MailAccountUpdateRequest $mailAccountUpdateRequest,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return UrlBuilder::for('/api/v1/mail-accounts/%d')
            ->addPathParameter($this->id)
            ->getEndpoint();
    }

    public function defaultBody(): array
    {
        return $this->mailAccountUpdateRequest->toArray();
    }

    /**
     * @throws JsonException
     * @returns MailAccountResource|DetailMessage|Collection<ValidationError>
     */
    public function createDtoFromResponse(Response $response): MailAccountResource|DetailMessage|Collection
    {
        return DtoBuilder::for($response, MailAccountResource::class)->build();
    }
}
