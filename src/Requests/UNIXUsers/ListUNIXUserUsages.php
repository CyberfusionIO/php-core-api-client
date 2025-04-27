<?php

namespace Cyberfusion\CoreApi\Requests\UNIXUsers;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\UNIXUserUsageResource;
use Cyberfusion\CoreApi\Support\UrlBuilder;
use Illuminate\Support\Collection;
use JsonException;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

/**
 * The highest usage of each time unit (e.g. every day when set to daily, starting at `timestamp`) is returned. Usages are only created for UNIX users on clusters with the `Web` group.
 */
class ListUNIXUserUsages extends Request implements CoreApiRequestContract
{
    protected Method $method = Method::GET;

    public function __construct(
        private readonly int $unixUserId,
        private readonly string $timestamp,
        private readonly ?string $timeUnit = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return UrlBuilder::for('/api/v1/unix-users/usages/%d')
            ->addPathParameter($this->unixUserId)
            ->addQueryParameter('timestamp', $this->timestamp)
            ->addQueryParameter('time_unit', $this->timeUnit)
            ->getEndpoint();
    }

    /**
     * @throws JsonException
     * @returns Collection<UNIXUserUsageResource>
     */
    public function createDtoFromResponse(Response $response): Collection
    {
        return $response->collect()->map(fn (array $item) => UNIXUserUsageResource::fromArray($item));
    }
}
