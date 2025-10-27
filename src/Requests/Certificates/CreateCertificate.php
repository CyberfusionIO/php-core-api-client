<?php

namespace Cyberfusion\CoreApi\Requests\Certificates;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\CertificateCreateRequest;
use Cyberfusion\CoreApi\Models\CertificateResource;
use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class CreateCertificate extends Request implements CoreApiRequestContract, HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        private readonly CertificateCreateRequest $certificateCreateRequest,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/v1/certificates';
    }

    public function defaultBody(): array
    {
        return $this->certificateCreateRequest->toArray();
    }

    /**
     * @throws JsonException
     * @returns CertificateResource
     */
    public function createDtoFromResponse(Response $response): CertificateResource
    {
        return CertificateResource::fromArray($response->json());
    }
}
