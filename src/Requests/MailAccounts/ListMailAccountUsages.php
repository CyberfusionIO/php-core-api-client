<?php

namespace Cyberfusion\CoreApi\Requests\MailAccounts;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\DetailMessage;
use Cyberfusion\CoreApi\Models\MailAccountUsageResource;
use Cyberfusion\CoreApi\Models\ValidationError;
use Cyberfusion\CoreApi\Support\DtoBuilder;
use Cyberfusion\CoreApi\Support\UrlBuilder;
use Illuminate\Support\Collection;
use JsonException;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

/**
 * The highest usage of each time unit (e.g. every day when set to daily, starting at `timestamp`) is returned.
 */
class ListMailAccountUsages extends Request implements CoreApiRequestContract
{
    protected Method $method = Method::GET;

    public function __construct(
        private readonly int $mailAccountId,
        private readonly string $timestamp,
        private readonly ?string $timeUnit = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return UrlBuilder::for('/api/v1/mail-accounts/usages/%d')
            ->addPathParameter($this->mailAccountId)
            ->addQueryParameter('timestamp', $this->timestamp)
            ->addQueryParameter('time_unit', $this->timeUnit)
            ->getEndpoint();
    }

    /**
     * @throws JsonException
     * @returns Collection<MailAccountUsageResource>|DetailMessage|Collection<ValidationError>
     */
    public function createDtoFromResponse(Response $response): Collection|DetailMessage
    {
        return DtoBuilder::for($response, MailAccountUsageResource::class)->buildCollection();
    }
}
