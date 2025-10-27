<?php

namespace Cyberfusion\CoreApi\Requests\BorgArchives;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\TaskCollectionResource;
use JsonException;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

/**
 * The archive must exist on the server. Check whether the archive exists on the server by calling the endpoint which gets archive metadata. The download URL can be found in the message of the task with the description 'Create URL to get object'. The download URL is valid for 15 minutes.
 */
class DownloadBorgArchive extends Request implements CoreApiRequestContract
{
    protected Method $method = Method::POST;

    public function __construct(
        private readonly int $id,
        private readonly ?string $callbackUrl = null,
        private readonly ?string $path = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return sprintf('/api/v1/borg-archives/%d/download', $this->id);
    }

    protected function defaultQuery(): array
    {
        $parameters = [];
        $parameters['callback_url'] = $this->callbackUrl;
        $parameters['path'] = $this->path;

        return array_filter($parameters);
    }

    /**
     * @throws JsonException
     * @returns TaskCollectionResource
     */
    public function createDtoFromResponse(Response $response): TaskCollectionResource
    {
        return TaskCollectionResource::fromArray($response->json());
    }
}
