<?php

namespace Cyberfusion\CoreApi\Requests\HaproxyListens;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\DetailMessage;
use JsonException;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class DeleteHaproxyListen extends Request implements CoreApiRequestContract
{
    protected Method $method = Method::DELETE;

    public function __construct(
        private readonly int $id,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return sprintf('/api/v1/haproxy-listens/%d', $this->id);
    }

    /**
     * @throws JsonException
     * @returns DetailMessage
     */
    public function createDtoFromResponse(Response $response): DetailMessage
    {
        return DetailMessage::fromArray($response->json());
    }
}
