<?php

namespace Cyberfusion\CoreApi\Requests\BorgRepositories;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\BorgArchiveMetadata;
use Illuminate\Support\Collection;
use JsonException;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

/**
 * Metadata is dynamically retrieved from the server, and may therefore take longer than retrieving the archive objects from the API. Therefore, metadata is split into a separate endpoint.
 */
class GetBorgArchivesMetadata extends Request implements CoreApiRequestContract
{
    protected Method $method = Method::GET;

    public function __construct(
        private readonly int $id,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return sprintf('/api/v1/borg-repositories/%d/archives-metadata', $this->id);
    }

    /**
     * @throws JsonException
     * @returns Collection<BorgArchiveMetadata>
     */
    public function createDtoFromResponse(Response $response): Collection
    {
        return $response->collect()->map(fn (array $item) => BorgArchiveMetadata::fromArray($item));
    }
}
