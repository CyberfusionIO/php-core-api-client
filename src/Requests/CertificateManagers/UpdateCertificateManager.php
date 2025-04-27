<?php

namespace Cyberfusion\CoreApi\Requests\CertificateManagers;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\CertificateManagerResource;
use Cyberfusion\CoreApi\Models\CertificateManagerUpdateRequest;
use Cyberfusion\CoreApi\Support\UrlBuilder;
use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class UpdateCertificateManager extends Request implements CoreApiRequestContract, HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PATCH;

    public function __construct(
        private readonly int $id,
        private readonly CertificateManagerUpdateRequest $certificateManagerUpdateRequest,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return UrlBuilder::for('/api/v1/certificate-managers/%d')
            ->addPathParameter($this->id)
            ->getEndpoint();
    }

    public function defaultBody(): array
    {
        return $this->certificateManagerUpdateRequest->toArray();
    }

    /**
     * @throws JsonException
     * @returns CertificateManagerResource
     */
    public function createDtoFromResponse(Response $response): CertificateManagerResource
    {
        return CertificateManagerResource::fromArray($response->json());
    }
}
