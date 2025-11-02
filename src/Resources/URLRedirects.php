<?php

namespace Cyberfusion\CoreApi\Resources;

use Cyberfusion\CoreApi\CoreApiResource;
use Cyberfusion\CoreApi\Models\URLRedirectCreateRequest;
use Cyberfusion\CoreApi\Models\URLRedirectUpdateRequest;
use Cyberfusion\CoreApi\Models\UrlRedirectsSearchRequest;
use Cyberfusion\CoreApi\Requests\URLRedirects\CreateURLRedirect;
use Cyberfusion\CoreApi\Requests\URLRedirects\DeleteURLRedirect;
use Cyberfusion\CoreApi\Requests\URLRedirects\ListURLRedirects;
use Cyberfusion\CoreApi\Requests\URLRedirects\ReadURLRedirect;
use Cyberfusion\CoreApi\Requests\URLRedirects\UpdateURLRedirect;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\Paginator;

class URLRedirects extends CoreApiResource
{
    public function createURLRedirect(URLRedirectCreateRequest $uRLRedirectCreateRequest): Response
    {
        return $this->connector->send(new CreateURLRedirect($uRLRedirectCreateRequest));
    }

    public function listURLRedirects(
        ?UrlRedirectsSearchRequest $includeFilters = null,
        array $includes = [],
    ): Paginator {
        return $this->connector->paginate(new ListURLRedirects($includeFilters, $includes));
    }

    public function readURLRedirect(int $id, array $includes = []): Response
    {
        return $this->connector->send(new ReadURLRedirect($id, $includes));
    }

    public function updateURLRedirect(int $id, URLRedirectUpdateRequest $uRLRedirectUpdateRequest): Response
    {
        return $this->connector->send(new UpdateURLRedirect($id, $uRLRedirectUpdateRequest));
    }

    public function deleteURLRedirect(int $id): Response
    {
        return $this->connector->send(new DeleteURLRedirect($id));
    }
}
