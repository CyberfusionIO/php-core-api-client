<?php

namespace Cyberfusion\CoreApi\Requests\CertificateManagers;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\CertificateManagerResource;
use Cyberfusion\CoreApi\Models\CertificateManagerUpdateDeprecatedRequest;
use Cyberfusion\CoreApi\Support\UrlBuilder;
use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

/**
 * The following properties can never be updated to a different value: * `common_names` * `provider_name` * `main_common_name` * `certificate_id` (automatically unset when deleting certificate) * `last_request_task_collection_uuid`
 */
class DeprecatedUpdateCertificateManager extends Request implements CoreApiRequestContract, HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;

    public function __construct(
        private readonly int $id,
        private readonly CertificateManagerUpdateDeprecatedRequest $certificateManagerUpdateDeprecatedRequest,
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
        return $this->certificateManagerUpdateDeprecatedRequest->toArray();
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
