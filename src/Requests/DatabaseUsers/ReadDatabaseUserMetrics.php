<?php

namespace Cyberfusion\CoreApi\Requests\DatabaseUsers;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\DatabaseUsersMetricsResource;
use JsonException;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class ReadDatabaseUserMetrics extends Request implements CoreApiRequestContract
{
    protected Method $method = Method::GET;

    public function __construct(
        private readonly int $id,
        private readonly string $startTimestamp,
        private readonly string $endTimestamp,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return sprintf('/api/v1/database-users/%d/metrics', $this->id);
    }

    protected function defaultQuery(): array
    {
        $parameters = [];
        $parameters['start_timestamp'] = $this->startTimestamp;
        $parameters['end_timestamp'] = $this->endTimestamp;

        return array_filter($parameters);
    }

    /**
     * @throws JsonException
     * @returns DatabaseUsersMetricsResource
     */
    public function createDtoFromResponse(Response $response): DatabaseUsersMetricsResource
    {
        return DatabaseUsersMetricsResource::fromArray($response->json());
    }
}
