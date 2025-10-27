<?php

namespace Cyberfusion\CoreApi\Requests\Daemons;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\DaemonResource;
use Cyberfusion\CoreApi\Models\DaemonUpdateRequest;
use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class UpdateDaemon extends Request implements CoreApiRequestContract, HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PATCH;

    public function __construct(
        private readonly int $id,
        private readonly DaemonUpdateRequest $daemonUpdateRequest,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return sprintf('/api/v1/daemons/%d', $this->id);
    }

    public function defaultBody(): array
    {
        return $this->daemonUpdateRequest->toArray();
    }

    /**
     * @throws JsonException
     * @returns DaemonResource
     */
    public function createDtoFromResponse(Response $response): DaemonResource
    {
        return DaemonResource::fromArray($response->json());
    }
}
