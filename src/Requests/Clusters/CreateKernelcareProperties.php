<?php

namespace Cyberfusion\CoreApi\Requests\Clusters;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\ClusterKernelcarePropertiesCreateRequest;
use Cyberfusion\CoreApi\Models\ClusterKernelcarePropertiesResource;
use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class CreateKernelcareProperties extends Request implements CoreApiRequestContract, HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        private readonly int $id,
        private readonly ClusterKernelcarePropertiesCreateRequest $clusterKernelcarePropertiesCreateRequest,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return sprintf('/api/v1/clusters/%d/properties/kernelcare', $this->id);
    }

    public function defaultBody(): array
    {
        return $this->clusterKernelcarePropertiesCreateRequest->toArray();
    }

    /**
     * @throws JsonException
     * @returns ClusterKernelcarePropertiesResource
     */
    public function createDtoFromResponse(Response $response): ClusterKernelcarePropertiesResource
    {
        return ClusterKernelcarePropertiesResource::fromArray($response->json());
    }
}
