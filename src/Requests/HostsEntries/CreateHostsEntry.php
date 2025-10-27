<?php

namespace Cyberfusion\CoreApi\Requests\HostsEntries;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\HostsEntryCreateRequest;
use Cyberfusion\CoreApi\Models\HostsEntryResource;
use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

/**
 * The following combinations of attributes are unique: - `host_name` + `cluster_id`
 */
class CreateHostsEntry extends Request implements CoreApiRequestContract, HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        private readonly HostsEntryCreateRequest $hostsEntryCreateRequest,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/v1/hosts-entries';
    }

    public function defaultBody(): array
    {
        return $this->hostsEntryCreateRequest->toArray();
    }

    /**
     * @throws JsonException
     * @returns HostsEntryResource
     */
    public function createDtoFromResponse(Response $response): HostsEntryResource
    {
        return HostsEntryResource::fromArray($response->json());
    }
}
