<?php

namespace Cyberfusion\CoreApi\Requests\HAProxyListensToNodes;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\DetailMessage;
use Cyberfusion\CoreApi\Models\HAProxyListenToNodeCreateRequest;
use Cyberfusion\CoreApi\Models\HAProxyListenToNodeResource;
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
 * The following combinations of attributes are unique: - `name` - `remote_host` + `remote_path` + `remote_username`
 */
class CreateHAProxyListenToNode extends Request implements CoreApiRequestContract, HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        private readonly HAProxyListenToNodeCreateRequest $hAProxyListenToNodeCreateRequest,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return UrlBuilder::for('/api/v1/haproxy-listens-to-nodes')->getEndpoint();
    }

    public function defaultBody(): array
    {
        return $this->hAProxyListenToNodeCreateRequest->toArray();
    }

    /**
     * @throws JsonException
     * @returns HAProxyListenToNodeResource|DetailMessage|Collection<ValidationError>
     */
    public function createDtoFromResponse(Response $response): HAProxyListenToNodeResource|DetailMessage|Collection
    {
        return DtoBuilder::for($response, HAProxyListenToNodeResource::class)->build();
    }
}
