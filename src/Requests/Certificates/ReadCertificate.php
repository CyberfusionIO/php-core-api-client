<?php

namespace Cyberfusion\CoreApi\Requests\Certificates;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\CertificateResource;
use JsonException;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class ReadCertificate extends Request implements CoreApiRequestContract
{
    protected Method $method = Method::GET;

    public function __construct(
        private readonly int $id,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return sprintf('/api/v1/certificates/%d', $this->id);
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
