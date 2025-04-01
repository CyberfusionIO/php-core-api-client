<?php

namespace Cyberfusion\CoreApi\Resources;

use Cyberfusion\CoreApi\Models\ClusterCreateRequest;
use Cyberfusion\CoreApi\Models\ClusterIPAddressCreateRequest;
use Cyberfusion\CoreApi\Models\ClusterUpdateDeprecatedRequest;
use Cyberfusion\CoreApi\Models\ClusterUpdateRequest;
use Cyberfusion\CoreApi\Requests\Clusters\CreateCluster;
use Cyberfusion\CoreApi\Requests\Clusters\CreateIPAddressForCluster;
use Cyberfusion\CoreApi\Requests\Clusters\DeleteCluster;
use Cyberfusion\CoreApi\Requests\Clusters\DeleteIPAddressForCluster;
use Cyberfusion\CoreApi\Requests\Clusters\DeprecatedUpdateCluster;
use Cyberfusion\CoreApi\Requests\Clusters\DisableL3DDoSProtectionForIPAddress;
use Cyberfusion\CoreApi\Requests\Clusters\EnableL3DDoSProtectionForIPAddress;
use Cyberfusion\CoreApi\Requests\Clusters\GetBorgSSHKey;
use Cyberfusion\CoreApi\Requests\Clusters\GetCommonProperties;
use Cyberfusion\CoreApi\Requests\Clusters\GetIPAddressesProductsForClusters;
use Cyberfusion\CoreApi\Requests\Clusters\ListClusterDeploymentsResults;
use Cyberfusion\CoreApi\Requests\Clusters\ListClusters;
use Cyberfusion\CoreApi\Requests\Clusters\ListIPAddressesForCluster;
use Cyberfusion\CoreApi\Requests\Clusters\ListUNIXUsersHomeDirectoryUsages;
use Cyberfusion\CoreApi\Requests\Clusters\ReadChildren;
use Cyberfusion\CoreApi\Requests\Clusters\ReadCluster;
use Cyberfusion\CoreApi\Requests\Clusters\UpdateCluster;
use Cyberfusion\CoreApi\Support\Filter;
use Cyberfusion\CoreApi\Support\Sorter;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;

class Clusters extends BaseResource
{
    public function getCommonProperties(string $baseUrl): Response
    {
        return $this->connector->send(new GetCommonProperties($baseUrl));
    }

    public function createCluster(ClusterCreateRequest $clusterCreateRequest, ?string $callbackUrl = null): Response
    {
        return $this->connector->send(new CreateCluster($clusterCreateRequest, $callbackUrl));
    }

    public function listClusters(
        ?int $skip = null,
        ?int $limit = null,
        ?Filter $filter = null,
        ?Sorter $sort = null,
    ): Response {
        return $this->connector->send(new ListClusters($skip, $limit, $filter, $sort));
    }

    public function readCluster(int $id): Response
    {
        return $this->connector->send(new ReadCluster($id));
    }

    public function deprecatedUpdateCluster(
        int $id,
        ClusterUpdateDeprecatedRequest $clusterUpdateDeprecatedRequest,
    ): Response {
        return $this->connector->send(new DeprecatedUpdateCluster($id, $clusterUpdateDeprecatedRequest));
    }

    public function updateCluster(int $id, ClusterUpdateRequest $clusterUpdateRequest): Response
    {
        return $this->connector->send(new UpdateCluster($id, $clusterUpdateRequest));
    }

    public function deleteCluster(int $id): Response
    {
        return $this->connector->send(new DeleteCluster($id));
    }

    public function readChildren(int $id): Response
    {
        return $this->connector->send(new ReadChildren($id));
    }

    public function getBorgSSHKey(int $id): Response
    {
        return $this->connector->send(new GetBorgSSHKey($id));
    }

    public function listIPAddressesForCluster(int $id): Response
    {
        return $this->connector->send(new ListIPAddressesForCluster($id));
    }

    public function createIPAddressForCluster(
        int $id,
        ClusterIPAddressCreateRequest $clusterIPAddressCreateRequest,
    ): Response {
        return $this->connector->send(new CreateIPAddressForCluster($id, $clusterIPAddressCreateRequest));
    }

    public function deleteIPAddressForCluster(int $id, string $ipAddress): Response
    {
        return $this->connector->send(new DeleteIPAddressForCluster($id, $ipAddress));
    }

    public function enableL3DDoSProtectionForIPAddress(int $id, string $ipAddress): Response
    {
        return $this->connector->send(new EnableL3DDoSProtectionForIPAddress($id, $ipAddress));
    }

    public function disableL3DDoSProtectionForIPAddress(int $id, string $ipAddress): Response
    {
        return $this->connector->send(new DisableL3DDoSProtectionForIPAddress($id, $ipAddress));
    }

    public function getIPAddressesProductsForClusters(string $baseUrl): Response
    {
        return $this->connector->send(new GetIPAddressesProductsForClusters($baseUrl));
    }

    public function listClusterDeploymentsResults(int $id, ?bool $getNonRunning = null): Response
    {
        return $this->connector->send(new ListClusterDeploymentsResults($id, $getNonRunning));
    }

    public function listUNIXUsersHomeDirectoryUsages(
        int $clusterId,
        string $timestamp,
        ?string $timeUnit = null,
    ): Response {
        return $this->connector->send(new ListUNIXUsersHomeDirectoryUsages($clusterId, $timestamp, $timeUnit));
    }
}
