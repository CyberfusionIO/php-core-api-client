<?php

namespace Cyberfusion\CoreApi\Requests\CMSes;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\CMSCreateRequest;
use Cyberfusion\CoreApi\Models\CMSResource;
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

/**
 * The following combinations of attributes are unique: - `virtual_host_id`
 */
class CreateCMS extends Request implements CoreApiRequestContract, HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        private readonly CMSCreateRequest $cMSCreateRequest,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return UrlBuilder::for('/api/v1/cmses')->getEndpoint();
    }

    public function defaultBody(): array
    {
        return $this->cMSCreateRequest->toArray();
    }

    /**
     * @throws JsonException
     * @returns CMSResource|DetailMessage|Collection<ValidationError>
     */
    public function createDtoFromResponse(Response $response): CMSResource|DetailMessage|Collection
    {
        return DtoBuilder::for($response, CMSResource::class)->build();
    }
}
