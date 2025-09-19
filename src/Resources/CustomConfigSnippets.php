<?php

namespace Cyberfusion\CoreApi\Resources;

use Cyberfusion\CoreApi\Models\CustomConfigSnippetUpdateRequest;
use Cyberfusion\CoreApi\Requests\CustomConfigSnippets\CreateCustomConfigSnippet;
use Cyberfusion\CoreApi\Requests\CustomConfigSnippets\DeleteCustomConfigSnippet;
use Cyberfusion\CoreApi\Requests\CustomConfigSnippets\ListCustomConfigSnippets;
use Cyberfusion\CoreApi\Requests\CustomConfigSnippets\ReadCustomConfigSnippet;
use Cyberfusion\CoreApi\Requests\CustomConfigSnippets\UpdateCustomConfigSnippet;
use Cyberfusion\CoreApi\Support\Filter;
use Cyberfusion\CoreApi\Support\Sorter;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;

class CustomConfigSnippets extends BaseResource
{
    public function createCustomConfigSnippet(): Response
    {
        return $this->connector->send(new CreateCustomConfigSnippet());
    }

    public function listCustomConfigSnippets(
        ?int $skip = null,
        ?int $limit = null,
        ?Filter $filter = null,
        ?Sorter $sort = null,
    ): Response {
        return $this->connector->send(new ListCustomConfigSnippets($skip, $limit, $filter, $sort));
    }

    public function readCustomConfigSnippet(int $id): Response
    {
        return $this->connector->send(new ReadCustomConfigSnippet($id));
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
