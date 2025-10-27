<?php

namespace Cyberfusion\CoreApi\Requests\Databases;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Enums\TimeUnitEnum;
use Cyberfusion\CoreApi\Models\DatabaseUsageResource;
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
        private readonly ?TimeUnitEnum $timeUnit = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return sprintf('/api/v1/databases/usages/%d', $this->databaseId);
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
     * @returns Collection<DatabaseUsageResource>
     */
    public function createDtoFromResponse(Response $response): Collection
    {
        return $response->collect()->map(fn (array $item) => DatabaseUsageResource::fromArray($item));
    }
}
