<?php

namespace Cyberfusion\CoreApi\Requests\BorgRepositories;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\BorgRepositoryResource;
use Cyberfusion\CoreApi\Models\BorgRepositoryUpdateDeprecatedRequest;
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
 * The following properties can never be updated to a different value: * `name` * `passphrase` * `remote_host` * `remote_path` * `remote_username`
 */
class DeprecatedUpdateBorgRepository extends Request implements CoreApiRequestContract, HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;

    public function __construct(
        private readonly int $id,
        private readonly BorgRepositoryUpdateDeprecatedRequest $borgRepositoryUpdateDeprecatedRequest,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return UrlBuilder::for('/api/v1/borg-repositories/%d')
            ->addPathParameter($this->id)
            ->getEndpoint();
    }

    public function defaultBody(): array
    {
        return $this->borgRepositoryUpdateDeprecatedRequest->toArray();
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
