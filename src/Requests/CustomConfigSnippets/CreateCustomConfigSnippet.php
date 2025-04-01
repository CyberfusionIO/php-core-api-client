<?php

namespace Cyberfusion\CoreApi\Requests\CustomConfigSnippets;

use Cyberfusion\CoreApi\Contracts\CoreApiRequestContract;
use Cyberfusion\CoreApi\Models\CustomConfigSnippetResource;
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
 * Compatible cluster groups: * Web The following combinations of attributes are unique: - `name` + `cluster_id`
 */
class CreateCustomConfigSnippet extends Request implements CoreApiRequestContract, HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return UrlBuilder::for('/api/v1/custom-config-snippets')->getEndpoint();
    }

    public function defaultBody(): array
    {
        return [];
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
