<?php

namespace Cyberfusion\CoreApi\Requests\Cmses;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\CmsDatabaseIndex;
use Illuminate\Support\Collection;
use JsonException;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

/**
 * This endpoint supports only WordPress CMSes. Creates a list of sane indexes recommended for the CMS database. This is not the full set of indexes on the database — only the additional indexes we recommend creating, on top of the ones the CMS itself creates. Indexes that already exist are skipped. Returns the indexes that were actually created.
 */
class CreateRecommendedCmsDatabaseIndexes extends Request implements CoreApiRequestContract
{
    protected Method $method = Method::POST;

    public function __construct(
        private readonly int $id,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return sprintf('/api/v1/cmses/%d/database-indexes', $this->id);
    }

    /**
     * @throws JsonException
     * @returns Collection<CmsDatabaseIndex>
     */
    public function createDtoFromResponse(Response $response): Collection
    {
        return $response->collect()->map(fn (array $item) => CmsDatabaseIndex::fromArray($item));
    }
}
