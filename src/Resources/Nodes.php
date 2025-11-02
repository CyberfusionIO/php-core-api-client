<?php

namespace Cyberfusion\CoreApi\Resources;

use Cyberfusion\CoreApi\CoreApiResource;
use Cyberfusion\CoreApi\Models\NodeCreateRequest;
use Cyberfusion\CoreApi\Models\NodeUpdateRequest;
use Cyberfusion\CoreApi\Models\NodesSearchRequest;
use Cyberfusion\CoreApi\Requests\Nodes\CreateNodes;
use Cyberfusion\CoreApi\Requests\Nodes\DeleteNode;
use Cyberfusion\CoreApi\Requests\Nodes\GetNodeProducts;
use Cyberfusion\CoreApi\Requests\Nodes\ListNodes;
use Cyberfusion\CoreApi\Requests\Nodes\ReadNode;
use Cyberfusion\CoreApi\Requests\Nodes\UpdateNode;
use Cyberfusion\CoreApi\Requests\Nodes\UpgradeOrDowngradeNode;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\Paginator;

class Nodes extends CoreApiResource
{
    public function createNodes(
        NodeCreateRequest $nodeCreateRequest,
        ?string $callbackUrl = null,
        ?int $amount = null,
    ): Response {
        return $this->connector->send(new CreateNodes($nodeCreateRequest, $callbackUrl, $amount));
    }

    public function listNodes(?NodesSearchRequest $includeFilters = null, array $includes = []): Paginator
    {
        return $this->connector->paginate(new ListNodes($includeFilters, $includes));
    }

    public function getNodeProducts(string $baseUrl): Response
    {
        return $this->connector->send(new GetNodeProducts($baseUrl));
    }

    public function readNode(int $id, array $includes = []): Response
    {
        return $this->connector->send(new ReadNode($id, $includes));
    }

    public function updateNode(int $id, NodeUpdateRequest $nodeUpdateRequest): Response
    {
        return $this->connector->send(new UpdateNode($id, $nodeUpdateRequest));
    }

    public function deleteNode(int $id, ?string $callbackUrl = null): Response
    {
        return $this->connector->send(new DeleteNode($id, $callbackUrl));
    }

    public function upgradeOrDowngradeNode(int $id, string $product, ?string $callbackUrl = null): Response
    {
        return $this->connector->send(new UpgradeOrDowngradeNode($id, $product, $callbackUrl));
    }
}
