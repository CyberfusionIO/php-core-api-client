<?php

namespace Cyberfusion\CoreApi\Resources;

use Cyberfusion\CoreApi\CoreApiResource;
use Cyberfusion\CoreApi\Models\HAProxyListenToNodeCreateRequest;
use Cyberfusion\CoreApi\Models\HaproxyListensToNodesSearchRequest;
use Cyberfusion\CoreApi\Requests\HAProxyListensToNodes\CreateHAProxyListenToNode;
use Cyberfusion\CoreApi\Requests\HAProxyListensToNodes\DeleteHAProxyListenToNode;
use Cyberfusion\CoreApi\Requests\HAProxyListensToNodes\ListHAProxyListensToNodes;
use Cyberfusion\CoreApi\Requests\HAProxyListensToNodes\ReadHAProxyListenToNode;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\Paginator;

class HAProxyListensToNodes extends CoreApiResource
{
    public function createHAProxyListenToNode(
        HAProxyListenToNodeCreateRequest $hAProxyListenToNodeCreateRequest,
    ): Response {
        return $this->connector->send(new CreateHAProxyListenToNode($hAProxyListenToNodeCreateRequest));
    }

    public function listHAProxyListensToNodes(?HaproxyListensToNodesSearchRequest $includeFilters = null): Paginator
    {
        return $this->connector->paginate(new ListHAProxyListensToNodes($includeFilters));
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
