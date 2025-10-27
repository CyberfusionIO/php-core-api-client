<?php

namespace Cyberfusion\CoreApi\Requests\CustomConfigSnippets;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\CustomConfigSnippetResource;
use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

/**
 * The following combinations of attributes are unique: - `name` + `cluster_id`
 */
class CreateCustomConfigSnippet extends Request implements CoreApiRequestContract, HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/api/v1/custom-config-snippets';
    }

    public function defaultBody(): array
    {
        return [];
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
