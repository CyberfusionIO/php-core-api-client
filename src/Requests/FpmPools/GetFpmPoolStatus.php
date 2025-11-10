<?php

namespace Cyberfusion\CoreApi\Requests\FpmPools;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\FpmPoolNodeStatus;
use Illuminate\Support\Collection;
use JsonException;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class GetFpmPoolStatus extends Request implements CoreApiRequestContract
{
    protected Method $method = Method::GET;

    public function __construct(
        private readonly int $id,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return sprintf('/api/v1/fpm-pools/%d/status', $this->id);
    }

    /**
     * @throws JsonException
     * @returns Collection<FpmPoolNodeStatus>
     */
    public function createDtoFromResponse(Response $response): Collection
    {
        return $response->collect()->map(fn (array $item) => FpmPoolNodeStatus::fromArray($item));
    }
}
