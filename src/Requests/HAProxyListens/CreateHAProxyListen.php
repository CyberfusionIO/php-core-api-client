<?php

namespace Cyberfusion\CoreApi\Requests\HAProxyListens;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\DetailMessage;
use Cyberfusion\CoreApi\Models\HAProxyListenCreateRequest;
use Cyberfusion\CoreApi\Models\HAProxyListenResource;
use Cyberfusion\CoreApi\Models\ValidationError;
use Cyberfusion\CoreApi\Support\DtoBuilder;
use Cyberfusion\CoreApi\Support\UrlBuilder;
use Illuminate\Support\Collection;
use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

/**
 * The following combinations of attributes are unique: - `name` + `cluster_id` - `port` + `cluster_id` - `socket_path` + `cluster_id`
 */
class CreateHAProxyListen extends Request implements CoreApiRequestContract, HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        private readonly HAProxyListenCreateRequest $hAProxyListenCreateRequest,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return UrlBuilder::for('/api/v1/haproxy-listens')->getEndpoint();
    }

    public function defaultBody(): array
    {
        return $this->hAProxyListenCreateRequest->toArray();
    }

    /**
     * @throws JsonException
     * @returns HAProxyListenResource|DetailMessage|Collection<ValidationError>
     */
    public function createDtoFromResponse(Response $response): HAProxyListenResource|DetailMessage|Collection
    {
        return DtoBuilder::for($response, HAProxyListenResource::class)->build();
    }
}
