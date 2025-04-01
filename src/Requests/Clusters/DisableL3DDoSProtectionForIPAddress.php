<?php

namespace Cyberfusion\CoreApi\Requests\Clusters;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\DetailMessage;
use Cyberfusion\CoreApi\Models\TaskCollectionResource;
use Cyberfusion\CoreApi\Models\ValidationError;
use Cyberfusion\CoreApi\Support\DtoBuilder;
use Cyberfusion\CoreApi\Support\UrlBuilder;
use Illuminate\Support\Collection;
use JsonException;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class DisableL3DDoSProtectionForIPAddress extends Request implements CoreApiRequestContract
{
    protected Method $method = Method::DELETE;

    public function __construct(
        private readonly int $id,
        private readonly string $ipAddress,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return UrlBuilder::for('/api/v1/clusters/%d/ip-addresses/%s/l3-ddos-protection')
            ->addPathParameter($this->id)
            ->addPathParameter($this->ipAddress)
            ->getEndpoint();
    }

    /**
     * @throws JsonException
     * @returns TaskCollectionResource|DetailMessage|Collection<ValidationError>
     */
    public function createDtoFromResponse(Response $response): TaskCollectionResource|DetailMessage|Collection
    {
        return DtoBuilder::for($response, TaskCollectionResource::class)->build();
    }
}
