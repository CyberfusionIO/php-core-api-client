<?php

namespace Cyberfusion\CoreApi\Resources;

use Cyberfusion\CoreApi\Models\HAProxyListenToNodeCreateRequest;
use Cyberfusion\CoreApi\Requests\HAProxyListensToNodes\CreateHAProxyListenToNode;
use Cyberfusion\CoreApi\Requests\HAProxyListensToNodes\DeleteHAProxyListenToNode;
use Cyberfusion\CoreApi\Requests\HAProxyListensToNodes\ListHAProxyListensToNodes;
use Cyberfusion\CoreApi\Requests\HAProxyListensToNodes\ReadHAProxyListenToNode;
use Cyberfusion\CoreApi\Support\Filter;
use Cyberfusion\CoreApi\Support\Sorter;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;

class HAProxyListensToNodes extends BaseResource
{
    public function createHAProxyListenToNode(
        HAProxyListenToNodeCreateRequest $hAProxyListenToNodeCreateRequest,
    ): Response {
        return $this->connector->send(new CreateHAProxyListenToNode($hAProxyListenToNodeCreateRequest));
    }

    public function listHAProxyListensToNodes(
        ?int $skip = null,
        ?int $limit = null,
        ?Filter $filter = null,
        ?Sorter $sort = null,
    ): Response {
        return $this->connector->send(new ListHAProxyListensToNodes($skip, $limit, $filter, $sort));
    }

    public function readHAProxyListenToNode(int $id): Response
    {
        return $this->connector->send(new ReadHAProxyListenToNode($id));
    }

    public function deleteHAProxyListenToNode(int $id): Response
    {
        return $this->connector->send(new DeleteHAProxyListenToNode($id));
    }
}
