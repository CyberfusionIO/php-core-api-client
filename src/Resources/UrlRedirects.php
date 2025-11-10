<?php

namespace Cyberfusion\CoreApi\Resources;

use Cyberfusion\CoreApi\CoreApiResource;
use Cyberfusion\CoreApi\Models\UrlRedirectCreateRequest;
use Cyberfusion\CoreApi\Models\UrlRedirectUpdateRequest;
use Cyberfusion\CoreApi\Models\UrlRedirectsSearchRequest;
use Cyberfusion\CoreApi\Requests\UrlRedirects\CreateUrlRedirect;
use Cyberfusion\CoreApi\Requests\UrlRedirects\DeleteUrlRedirect;
use Cyberfusion\CoreApi\Requests\UrlRedirects\ListUrlRedirects;
use Cyberfusion\CoreApi\Requests\UrlRedirects\ReadUrlRedirect;
use Cyberfusion\CoreApi\Requests\UrlRedirects\UpdateUrlRedirect;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\Paginator;

class UrlRedirects extends CoreApiResource
{
    public function createUrlRedirect(UrlRedirectCreateRequest $urlRedirectCreateRequest): Response
    {
        return $this->connector->send(new CreateUrlRedirect($urlRedirectCreateRequest));
    }

    public function listUrlRedirects(
        ?UrlRedirectsSearchRequest $includeFilters = null,
        array $includes = [],
    ): Paginator {
        return $this->connector->paginate(new ListUrlRedirects($includeFilters, $includes));
    }

    public function readUrlRedirect(int $id, array $includes = []): Response
    {
        return $this->connector->send(new ReadUrlRedirect($id, $includes));
    }

    public function updateUrlRedirect(int $id, UrlRedirectUpdateRequest $urlRedirectUpdateRequest): Response
    {
        return $this->connector->send(new UpdateUrlRedirect($id, $urlRedirectUpdateRequest));
    }

    public function deleteUrlRedirect(int $id): Response
    {
        return $this->connector->send(new DeleteUrlRedirect($id));
    }
}
