<?php

namespace Cyberfusion\CoreApi\Requests\BorgRepositories;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\BorgRepositoryCreateRequest;
use Cyberfusion\CoreApi\Models\BorgRepositoryResource;
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
 * Compatible cluster groups: * Borg Client The following combinations of attributes are unique: - `name`
 */
class CreateBorgRepository extends Request implements CoreApiRequestContract, HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        private readonly BorgRepositoryCreateRequest $borgRepositoryCreateRequest,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return UrlBuilder::for('/api/v1/borg-repositories')->getEndpoint();
    }

    public function defaultBody(): array
    {
        return $this->borgRepositoryCreateRequest->toArray();
    }

    /**
     * @throws JsonException
     * @returns BorgRepositoryResource|DetailMessage|Collection<ValidationError>
     */
    public function createDtoFromResponse(Response $response): BorgRepositoryResource|DetailMessage|Collection
    {
        return DtoBuilder::for($response, BorgRepositoryResource::class)->build();
    }
}
