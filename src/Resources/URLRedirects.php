<?php

namespace Cyberfusion\CoreApi\Resources;

use Cyberfusion\CoreApi\Models\URLRedirectCreateRequest;
use Cyberfusion\CoreApi\Models\URLRedirectUpdateDeprecatedRequest;
use Cyberfusion\CoreApi\Models\URLRedirectUpdateRequest;
use Cyberfusion\CoreApi\Requests\URLRedirects\CreateURLRedirect;
use Cyberfusion\CoreApi\Requests\URLRedirects\DeleteURLRedirect;
use Cyberfusion\CoreApi\Requests\URLRedirects\DeprecatedUpdateURLRedirect;
use Cyberfusion\CoreApi\Requests\URLRedirects\ListURLRedirects;
use Cyberfusion\CoreApi\Requests\URLRedirects\ReadURLRedirect;
use Cyberfusion\CoreApi\Requests\URLRedirects\UpdateURLRedirect;
use Cyberfusion\CoreApi\Support\Filter;
use Cyberfusion\CoreApi\Support\Sorter;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;

class URLRedirects extends BaseResource
{
    public function createURLRedirect(URLRedirectCreateRequest $uRLRedirectCreateRequest): Response
    {
        return $this->connector->send(new CreateURLRedirect($uRLRedirectCreateRequest));
    }

    public function listURLRedirects(
        ?int $skip = null,
        ?int $limit = null,
        ?Filter $filter = null,
        ?Sorter $sort = null,
    ): Response {
        return $this->connector->send(new ListURLRedirects($skip, $limit, $filter, $sort));
    }

    public function readURLRedirect(int $id): Response
    {
        return $this->connector->send(new ReadURLRedirect($id));
    }

    public function deprecatedUpdateURLRedirect(
        int $id,
        URLRedirectUpdateDeprecatedRequest $uRLRedirectUpdateDeprecatedRequest,
    ): Response {
        return $this->connector->send(new DeprecatedUpdateURLRedirect($id, $uRLRedirectUpdateDeprecatedRequest));
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
