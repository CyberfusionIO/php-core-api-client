<?php

namespace Cyberfusion\CoreApi\Requests\Daemons;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\DaemonResource;
use Cyberfusion\CoreApi\Models\DaemonUpdateDeprecatedRequest;
use Cyberfusion\CoreApi\Support\UrlBuilder;
use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

/**
 * The following properties can never be updated to a different value: * `name` * `unix_user_id`
 */
class DeprecatedUpdateDaemon extends Request implements CoreApiRequestContract, HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;

    public function __construct(
        private readonly int $id,
        private readonly DaemonUpdateDeprecatedRequest $daemonUpdateDeprecatedRequest,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return UrlBuilder::for('/api/v1/daemons/%d')
            ->addPathParameter($this->id)
            ->getEndpoint();
    }

    public function defaultBody(): array
    {
        return $this->daemonUpdateDeprecatedRequest->toArray();
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
