<?php

namespace Cyberfusion\CoreApi\Requests\CertificateManagers;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\CertificateManagerCreateRequest;
use Cyberfusion\CoreApi\Models\CertificateManagerResource;
use Cyberfusion\CoreApi\Support\UrlBuilder;
use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class CreateCertificateManager extends Request implements CoreApiRequestContract, HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        private readonly CertificateManagerCreateRequest $certificateManagerCreateRequest,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return UrlBuilder::for('/api/v1/certificate-managers')->getEndpoint();
    }

    public function defaultBody(): array
    {
        return $this->certificateManagerCreateRequest->toArray();
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
