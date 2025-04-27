<?php

namespace Cyberfusion\CoreApi\Requests\FPMPools;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\FPMPoolResource;
use Cyberfusion\CoreApi\Models\FPMPoolUpdateDeprecatedRequest;
use Cyberfusion\CoreApi\Support\UrlBuilder;
use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

/**
 * The following properties can never be updated to a different value: * `name` * `version`
 */
class DeprecatedUpdateFPMPool extends Request implements CoreApiRequestContract, HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;

    public function __construct(
        private readonly int $id,
        private readonly FPMPoolUpdateDeprecatedRequest $fPMPoolUpdateDeprecatedRequest,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return UrlBuilder::for('/api/v1/fpm-pools/%d')
            ->addPathParameter($this->id)
            ->getEndpoint();
    }

    public function defaultBody(): array
    {
        return $this->fPMPoolUpdateDeprecatedRequest->toArray();
    }

    /**
     * @throws JsonException
     * @returns FPMPoolResource
     */
    public function createDtoFromResponse(Response $response): FPMPoolResource
    {
        return FPMPoolResource::fromArray($response->json());
    }
}
