<?php

namespace Cyberfusion\CoreApi\Resources;

use Cyberfusion\CoreApi\CoreApiResource;
use Cyberfusion\CoreApi\Models\HaproxyListenToNodeCreateRequest;
use Cyberfusion\CoreApi\Models\HaproxyListensToNodesSearchRequest;
use Cyberfusion\CoreApi\Requests\HaproxyListensToNodes\CreateHaproxyListenToNode;
use Cyberfusion\CoreApi\Requests\HaproxyListensToNodes\DeleteHaproxyListenToNode;
use Cyberfusion\CoreApi\Requests\HaproxyListensToNodes\ListHaproxyListensToNodes;
use Cyberfusion\CoreApi\Requests\HaproxyListensToNodes\ReadHaproxyListenToNode;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\Paginator;

class HaproxyListensToNodes extends CoreApiResource
{
    public function createHaproxyListenToNode(
        HaproxyListenToNodeCreateRequest $haproxyListenToNodeCreateRequest,
    ): Response {
        return $this->connector->send(new CreateHaproxyListenToNode($haproxyListenToNodeCreateRequest));
    }

    public function listHaproxyListensToNodes(
        ?HaproxyListensToNodesSearchRequest $includeFilters = null,
        array $includes = [],
    ): Paginator {
        return $this->connector->paginate(new ListHaproxyListensToNodes($includeFilters, $includes));
    }

    public function readHaproxyListenToNode(int $id, array $includes = []): Response
    {
        return $this->connector->send(new ReadHaproxyListenToNode($id, $includes));
    }

    public function deleteHaproxyListenToNode(int $id): Response
    {
        return $this->connector->send(new DeleteHaproxyListenToNode($id));
    }
}
