<?php

namespace Cyberfusion\CoreApi\Requests\BorgArchives;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\BorgArchiveResource;
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
        private readonly array $includes = [],
    ) {
    }

    public function resolveEndpoint(): string
    {
        return sprintf('/api/v1/borg-archives/%d', $this->id);
    }

    protected function defaultQuery(): array
    {
        $parameters = [];
        $parameters['includes'] = implode(',', $this->includes);

        return array_filter($parameters);
    }

    /**
     * @throws JsonException
     * @returns BorgArchiveResource
     */
    public function createDtoFromResponse(Response $response): BorgArchiveResource
    {
        return BorgArchiveResource::fromArray($response->json());
    }
}
