<?php

namespace Cyberfusion\CoreApi\Requests\MailAccounts;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Enums\TimeUnitEnum;
use Cyberfusion\CoreApi\Models\MailAccountUsageResource;
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
        private readonly ?TimeUnitEnum $timeUnit = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return sprintf('/api/v1/mail-accounts/usages/%d', $this->mailAccountId);
    }

    protected function defaultQuery(): array
    {
        $parameters = [];
        $parameters['timestamp'] = $this->timestamp;
        $parameters['time_unit'] = $this->timeUnit;

        return array_filter($parameters);
    }

    /**
     * @throws JsonException
     * @returns Collection<MailAccountUsageResource>
     */
    public function createDtoFromResponse(Response $response): Collection
    {
        return $response->collect()->map(fn (array $item) => MailAccountUsageResource::fromArray($item));
    }
}
