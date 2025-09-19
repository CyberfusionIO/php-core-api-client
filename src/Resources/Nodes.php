<?php

namespace Cyberfusion\CoreApi\Resources;

use Cyberfusion\CoreApi\Models\NodeCreateRequest;
use Cyberfusion\CoreApi\Models\NodeUpdateRequest;
use Cyberfusion\CoreApi\Requests\Nodes\CreateNode;
use Cyberfusion\CoreApi\Requests\Nodes\DeleteNode;
use Cyberfusion\CoreApi\Requests\Nodes\GetNodeProducts;
use Cyberfusion\CoreApi\Requests\Nodes\ListNodes;
use Cyberfusion\CoreApi\Requests\Nodes\ReadNode;
use Cyberfusion\CoreApi\Requests\Nodes\UpdateNode;
use Cyberfusion\CoreApi\Requests\Nodes\UpgradeOrDowngradeNode;
use Cyberfusion\CoreApi\Support\Filter;
use Cyberfusion\CoreApi\Support\Sorter;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;

class Nodes extends BaseResource
{
    public function createNode(NodeCreateRequest $nodeCreateRequest, ?string $callbackUrl = null): Response
    {
        return $this->connector->send(new CreateNode($nodeCreateRequest, $callbackUrl));
    }

    public function listNodes(
        ?int $skip = null,
        ?int $limit = null,
        ?Filter $filter = null,
        ?Sorter $sort = null,
    ): Response {
        return $this->connector->send(new ListNodes($skip, $limit, $filter, $sort));
    }

    public function getNodeProducts(string $baseUrl): Response
    {
        return $this->connector->send(new GetNodeProducts($baseUrl));
    }

    public function readNode(int $id): Response
    {
        return $this->connector->send(new ReadNode($id));
    }

    public function updateNode(int $id, NodeUpdateRequest $nodeUpdateRequest): Response
    {
        return $this->connector->send(new UpdateNode($id, $nodeUpdateRequest));
    }

    public function deleteNode(int $id): Response
    {
        return $this->connector->send(new DeleteNode($id));
    }

    public function upgradeOrDowngradeNode(int $id, string $product, ?string $callbackUrl = null): Response
    {
        return $this->connector->send(new UpgradeOrDowngradeNode($id, $product, $callbackUrl));
    }
}
