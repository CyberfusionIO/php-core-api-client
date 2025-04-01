<?php

namespace Cyberfusion\CoreApi\Requests\CertificateManagers;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\CertificateManagerCreateRequest;
use Cyberfusion\CoreApi\Models\CertificateManagerResource;
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
     * @returns CertificateManagerResource|DetailMessage|Collection<ValidationError>
     */
    public function createDtoFromResponse(Response $response): CertificateManagerResource|DetailMessage|Collection
    {
        return DtoBuilder::for($response, CertificateManagerResource::class)->build();
    }
}
