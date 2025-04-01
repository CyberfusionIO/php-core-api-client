<?php

namespace Cyberfusion\CoreApi\Requests\CustomConfigSnippets;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\CustomConfigSnippetResource;
use Cyberfusion\CoreApi\Models\CustomConfigSnippetUpdateDeprecatedRequest;
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
 * The following properties can never be updated to a different value: * `name` * `server_software_name`
 */
class DeprecatedUpdateCustomConfigSnippet extends Request implements CoreApiRequestContract, HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;

    public function __construct(
        private readonly int $id,
        private readonly CustomConfigSnippetUpdateDeprecatedRequest $customConfigSnippetUpdateDeprecatedRequest,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return UrlBuilder::for('/api/v1/custom-config-snippets/%d')
            ->addPathParameter($this->id)
            ->getEndpoint();
    }

    public function defaultBody(): array
    {
        return $this->customConfigSnippetUpdateDeprecatedRequest->toArray();
    }

    /**
     * @throws JsonException
     * @returns CustomConfigSnippetResource|DetailMessage|Collection<ValidationError>
     */
    public function createDtoFromResponse(Response $response): CustomConfigSnippetResource|DetailMessage|Collection
    {
        return DtoBuilder::for($response, CustomConfigSnippetResource::class)->build();
    }
}
