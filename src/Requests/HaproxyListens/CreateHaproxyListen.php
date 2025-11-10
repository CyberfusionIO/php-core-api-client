<?php

namespace Cyberfusion\CoreApi\Requests\HaproxyListens;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\HaproxyListenCreateRequest;
use Cyberfusion\CoreApi\Models\HaproxyListenResource;
use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

/**
 * The following combinations of attributes are unique: - `name` + `cluster_id` - `port` + `cluster_id` - `socket_path` + `cluster_id`
 */
class CreateHaproxyListen extends Request implements CoreApiRequestContract, HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        private readonly HaproxyListenCreateRequest $haproxyListenCreateRequest,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/v1/haproxy-listens';
    }

    public function defaultBody(): array
    {
        return $this->haproxyListenCreateRequest->toArray();
    }

    /**
     * @throws JsonException
     * @returns HaproxyListenResource
     */
    public function createDtoFromResponse(Response $response): HaproxyListenResource
    {
        return HaproxyListenResource::fromArray($response->json());
    }
}
