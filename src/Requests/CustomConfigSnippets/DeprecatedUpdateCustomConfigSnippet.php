<?php

namespace Cyberfusion\CoreApi\Requests\CustomConfigSnippets;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\CustomConfigSnippetResource;
use Cyberfusion\CoreApi\Models\CustomConfigSnippetUpdateDeprecatedRequest;
use Cyberfusion\CoreApi\Support\UrlBuilder;
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
     * @returns CustomConfigSnippetResource
     */
    public function createDtoFromResponse(Response $response): CustomConfigSnippetResource
    {
        return CustomConfigSnippetResource::fromArray($response->json());
    }
}
