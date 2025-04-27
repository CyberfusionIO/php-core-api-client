<?php

namespace Cyberfusion\CoreApi\Requests\Databases;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\DatabaseUsageResource;
use Cyberfusion\CoreApi\Support\UrlBuilder;
use Illuminate\Support\Collection;
use JsonException;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

/**
 * The highest usage of each time unit is returned (e.g. every day when set to daily, starting at `timestamp`).
 */
class ListDatabaseUsages extends Request implements CoreApiRequestContract
{
    protected Method $method = Method::GET;

    public function __construct(
        private readonly int $databaseId,
        private readonly string $timestamp,
        private readonly ?string $timeUnit = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return UrlBuilder::for('/api/v1/databases/usages/%d')
            ->addPathParameter($this->databaseId)
            ->addQueryParameter('timestamp', $this->timestamp)
            ->addQueryParameter('time_unit', $this->timeUnit)
            ->getEndpoint();
    }

    /**
     * @throws JsonException
     * @returns Collection<DatabaseUsageResource>
     */
    public function createDtoFromResponse(Response $response): Collection
    {
        return $response->collect()->map(fn (array $item) => DatabaseUsageResource::fromArray($item));
    }
}
