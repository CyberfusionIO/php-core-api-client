<?php

namespace Cyberfusion\CoreApi\Requests\BorgArchives;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\BorgArchiveMetadata;
use Cyberfusion\CoreApi\Models\DetailMessage;
use Cyberfusion\CoreApi\Models\ValidationError;
use Cyberfusion\CoreApi\Support\DtoBuilder;
use Cyberfusion\CoreApi\Support\UrlBuilder;
use Illuminate\Support\Collection;
use JsonException;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

/**
 * Metadata is dynamically retrieved from the server, and may therefore take longer than retrieving the archive object from the API. Therefore, metadata is split into a separate endpoint.
 */
class GetBorgArchiveMetadata extends Request implements CoreApiRequestContract
{
    protected Method $method = Method::GET;

    public function __construct(
        private readonly int $id,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return UrlBuilder::for('/api/v1/borg-archives/%d/metadata')
            ->addPathParameter($this->id)
            ->getEndpoint();
    }

    /**
     * @throws JsonException
     * @returns BorgArchiveMetadata|DetailMessage|Collection<ValidationError>
     */
    public function createDtoFromResponse(Response $response): BorgArchiveMetadata|DetailMessage|Collection
    {
        return DtoBuilder::for($response, BorgArchiveMetadata::class)->build();
    }
}
