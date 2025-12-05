<?php

namespace Cyberfusion\CoreApi\Requests\UnixUsers;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Enums\TimeUnitEnum;
use Cyberfusion\CoreApi\Models\UnixUserUsageResource;
use Illuminate\Support\Collection;
use JsonException;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

/**
 * The highest usage of each time unit (e.g. every day when set to daily, starting at `timestamp`) is returned. Usages are only created for UNIX users on clusters with the `Web` group.
 */
class ListUnixUserUsages extends Request implements CoreApiRequestContract
{
    protected Method $method = Method::GET;

    public function __construct(
        private readonly int $id,
        private readonly string $timestamp,
        private readonly ?TimeUnitEnum $timeUnit = null,
        private readonly array $includes = [],
    ) {
    }

    public function resolveEndpoint(): string
    {
        return sprintf('/api/v1/unix-users/%d/usages', $this->id);
    }

    protected function defaultQuery(): array
    {
        $parameters = [];
        $parameters['timestamp'] = $this->timestamp;
        $parameters['time_unit'] = $this->timeUnit?->value;
        $parameters['includes'] = implode(',', $this->includes);

        return array_filter($parameters);
    }

    /**
     * @throws JsonException
     * @returns Collection<UnixUserUsageResource>
     */
    public function createDtoFromResponse(Response $response): Collection
    {
        return $response->collect()->map(fn (array $item) => UnixUserUsageResource::fromArray($item));
    }
}
