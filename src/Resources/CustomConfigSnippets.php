<?php

namespace Cyberfusion\CoreApi\Resources;

use Cyberfusion\CoreApi\CoreApiResource;
use Cyberfusion\CoreApi\Models\CustomConfigSnippetUpdateRequest;
use Cyberfusion\CoreApi\Models\CustomConfigSnippetsSearchRequest;
use Cyberfusion\CoreApi\Requests\CustomConfigSnippets\CreateCustomConfigSnippet;
use Cyberfusion\CoreApi\Requests\CustomConfigSnippets\DeleteCustomConfigSnippet;
use Cyberfusion\CoreApi\Requests\CustomConfigSnippets\ListCustomConfigSnippets;
use Cyberfusion\CoreApi\Requests\CustomConfigSnippets\ReadCustomConfigSnippet;
use Cyberfusion\CoreApi\Requests\CustomConfigSnippets\UpdateCustomConfigSnippet;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\Paginator;

class CustomConfigSnippets extends CoreApiResource
{
    public function createCustomConfigSnippet(): Response
    {
        return $this->connector->send(new CreateCustomConfigSnippet());
    }

    public function listCustomConfigSnippets(
        ?CustomConfigSnippetsSearchRequest $includeFilters = null,
        array $includes = [],
    ): Paginator {
        return $this->connector->paginate(new ListCustomConfigSnippets($includeFilters, $includes));
    }

    public function readCustomConfigSnippet(int $id, array $includes = []): Response
    {
        return $this->connector->send(new ReadCustomConfigSnippet($id, $includes));
    }

    public function updateCustomConfigSnippet(
        int $id,
        CustomConfigSnippetUpdateRequest $customConfigSnippetUpdateRequest,
    ): Response {
        return $this->connector->send(new UpdateCustomConfigSnippet($id, $customConfigSnippetUpdateRequest));
    }

    public function deleteCustomConfigSnippet(int $id): Response
    {
        return $this->connector->send(new DeleteCustomConfigSnippet($id));
    }
}
