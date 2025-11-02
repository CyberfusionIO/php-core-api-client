<?php

namespace Cyberfusion\CoreApi\Resources;

use Cyberfusion\CoreApi\CoreApiResource;
use Cyberfusion\CoreApi\Models\NodeAddOnCreateRequest;
use Cyberfusion\CoreApi\Models\NodeAddOnsSearchRequest;
use Cyberfusion\CoreApi\Requests\NodeAddOns\CreateNodeAddOn;
use Cyberfusion\CoreApi\Requests\NodeAddOns\DeleteNodeAddOn;
use Cyberfusion\CoreApi\Requests\NodeAddOns\GetNodeAddOnProducts;
use Cyberfusion\CoreApi\Requests\NodeAddOns\ListNodeAddOns;
use Cyberfusion\CoreApi\Requests\NodeAddOns\ReadNodeAddOn;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\Paginator;

class NodeAddOns extends CoreApiResource
{
    public function createNodeAddOn(
        NodeAddOnCreateRequest $nodeAddOnCreateRequest,
        ?string $callbackUrl = null,
    ): Response {
        return $this->connector->send(new CreateNodeAddOn($nodeAddOnCreateRequest, $callbackUrl));
    }

    public function listNodeAddOns(?NodeAddOnsSearchRequest $includeFilters = null, array $includes = []): Paginator
    {
        return $this->connector->paginate(new ListNodeAddOns($includeFilters, $includes));
    }

    public function getNodeAddOnProducts(string $baseUrl): Response
    {
        return $this->connector->send(new GetNodeAddOnProducts($baseUrl));
    }

    public function readNodeAddOn(int $id, array $includes = []): Response
    {
        return $this->connector->send(new ReadNodeAddOn($id, $includes));
    }

    public function deleteNodeAddOn(int $id, ?string $callbackUrl = null): Response
    {
        return $this->connector->send(new DeleteNodeAddOn($id, $callbackUrl));
    }
}
