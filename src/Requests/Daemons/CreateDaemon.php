<?php

namespace Cyberfusion\CoreApi\Requests\Daemons;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\DaemonCreateRequest;
use Cyberfusion\CoreApi\Models\DaemonResource;
use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

/**
 * The following combinations of attributes are unique: - `name`
 */
class CreateDaemon extends Request implements CoreApiRequestContract, HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        private readonly DaemonCreateRequest $daemonCreateRequest,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/v1/daemons';
    }

    public function defaultBody(): array
    {
        return $this->daemonCreateRequest->toArray();
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
