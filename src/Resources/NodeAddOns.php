<?php

namespace Cyberfusion\CoreApi\Resources;

use Cyberfusion\CoreApi\Models\NodeAddOnCreateRequest;
use Cyberfusion\CoreApi\Requests\NodeAddOns\CreateNodeAddOn;
use Cyberfusion\CoreApi\Requests\NodeAddOns\DeleteNodeAddOn;
use Cyberfusion\CoreApi\Requests\NodeAddOns\GetNodeAddOnProducts;
use Cyberfusion\CoreApi\Requests\NodeAddOns\ListNodeAddOns;
use Cyberfusion\CoreApi\Requests\NodeAddOns\ReadNodeAddOn;
use Cyberfusion\CoreApi\Support\Filter;
use Cyberfusion\CoreApi\Support\Sorter;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;

class NodeAddOns extends BaseResource
{
    public function createNodeAddOn(NodeAddOnCreateRequest $nodeAddOnCreateRequest): Response
    {
        return $this->connector->send(new CreateNodeAddOn($nodeAddOnCreateRequest));
    }

    public function listNodeAddOns(
        ?int $skip = null,
        ?int $limit = null,
        ?Filter $filter = null,
        ?Sorter $sort = null,
    ): Response {
        return $this->connector->send(new ListNodeAddOns($skip, $limit, $filter, $sort));
    }

    public function getNodeAddOnProducts(string $baseUrl): Response
    {
        return $this->connector->send(new GetNodeAddOnProducts($baseUrl));
    }

    public function readNodeAddOn(int $id): Response
    {
        return $this->connector->send(new ReadNodeAddOn($id));
    }

    public function deleteNodeAddOn(int $id): Response
    {
        return $this->connector->send(new DeleteNodeAddOn($id));
    }
}
