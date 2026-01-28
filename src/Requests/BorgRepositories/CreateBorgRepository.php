<?php

namespace Cyberfusion\CoreApi\Requests\BorgRepositories;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\BorgRepositoryCreateRequest;
use Cyberfusion\CoreApi\Models\BorgRepositoryResource;
use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

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
        return '/api/v1/borg-repositories';
    }

    public function defaultBody(): array
    {
        return $this->borgRepositoryCreateRequest->toArray();
    }

    /**
     * @throws JsonException
     * @returns BorgRepositoryResource
     */
    public function createDtoFromResponse(Response $response): BorgRepositoryResource
    {
        return BorgRepositoryResource::fromArray($response->json());
    }
}
