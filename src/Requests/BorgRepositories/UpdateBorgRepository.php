<?php

namespace Cyberfusion\CoreApi\Requests\BorgRepositories;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\BorgRepositoryResource;
use Cyberfusion\CoreApi\Models\BorgRepositoryUpdateRequest;
use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

class UpdateBorgRepository extends Request implements CoreApiRequestContract, HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PATCH;

    public function __construct(
        private readonly int $id,
        private readonly BorgRepositoryUpdateRequest $borgRepositoryUpdateRequest,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return sprintf('/api/v1/borg-repositories/%d', $this->id);
    }

    public function defaultBody(): array
    {
        return $this->borgRepositoryUpdateRequest->toArray();
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
