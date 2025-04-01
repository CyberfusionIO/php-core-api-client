<?php

namespace Cyberfusion\CoreApi\Requests\BorgArchives;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\BorgArchiveResource;
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
 * The list of archives returned by this endpoint may not exist on the server, for two reasons: - This list contains only archives that were created using the API. Although discouraged, archives can be created outside of the API. Such archives do not show up here, as the API does not know about them. - Archives that are removed (usually by pruning the Borg repository) are not removed from the API. Use the 'get metadata' endpoint to determine whether an archive exists on the server.
 */
class ReadBorgArchive extends Request implements CoreApiRequestContract
{
    protected Method $method = Method::GET;

    public function __construct(
        private readonly int $id,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return UrlBuilder::for('/api/v1/borg-archives/%d')
            ->addPathParameter($this->id)
            ->getEndpoint();
    }

    /**
     * @throws JsonException
     * @returns BorgArchiveResource|DetailMessage|Collection<ValidationError>
     */
    public function createDtoFromResponse(Response $response): BorgArchiveResource|DetailMessage|Collection
    {
        return DtoBuilder::for($response, BorgArchiveResource::class)->build();
    }
}
