<?php

namespace Cyberfusion\CoreApi\Requests\FPMPools;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\DetailMessage;
use Cyberfusion\CoreApi\Models\FPMPoolCreateRequest;
use Cyberfusion\CoreApi\Models\FPMPoolResource;
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

/**
 * Compatible cluster groups: * Web The following combinations of attributes are unique: - `name`
 */
class CreateFPMPool extends Request implements CoreApiRequestContract, HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        private readonly FPMPoolCreateRequest $fPMPoolCreateRequest,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return UrlBuilder::for('/api/v1/fpm-pools')->getEndpoint();
    }

    public function defaultBody(): array
    {
        return $this->fPMPoolCreateRequest->toArray();
    }

    /**
     * @throws JsonException
     * @returns FPMPoolResource|DetailMessage|Collection<ValidationError>
     */
    public function createDtoFromResponse(Response $response): FPMPoolResource|DetailMessage|Collection
    {
        return DtoBuilder::for($response, FPMPoolResource::class)->build();
    }
}
