<?php

namespace Cyberfusion\CoreApi\Requests\Certificates;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\CertificateCreateRequest;
use Cyberfusion\CoreApi\Models\CertificateResource;
use Cyberfusion\CoreApi\Models\DetailMessage;
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
        return UrlBuilder::for('/api/v1/certificates')->getEndpoint();
    }

    public function defaultBody(): array
    {
        return $this->certificateCreateRequest->toArray();
    }

    /**
     * @throws JsonException
     * @returns CertificateResource|DetailMessage|Collection<ValidationError>
     */
    public function createDtoFromResponse(Response $response): CertificateResource|DetailMessage|Collection
    {
        return DtoBuilder::for($response, CertificateResource::class)->build();
    }
}
