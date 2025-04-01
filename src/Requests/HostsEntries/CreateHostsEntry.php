<?php

namespace Cyberfusion\CoreApi\Requests\HostsEntries;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\DetailMessage;
use Cyberfusion\CoreApi\Models\HostsEntryCreateRequest;
use Cyberfusion\CoreApi\Models\HostsEntryResource;
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
 * Compatible cluster groups: * Web The following combinations of attributes are unique: - `host_name` + `cluster_id`
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
        return UrlBuilder::for('/api/v1/hosts-entries')->getEndpoint();
    }

    public function defaultBody(): array
    {
        return $this->hostsEntryCreateRequest->toArray();
    }

    /**
     * @throws JsonException
     * @returns HostsEntryResource|DetailMessage|Collection<ValidationError>
     */
    public function createDtoFromResponse(Response $response): HostsEntryResource|DetailMessage|Collection
    {
        return DtoBuilder::for($response, HostsEntryResource::class)->build();
    }
}
