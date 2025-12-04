<?php

namespace Cyberfusion\CoreApi\Resources;

use Cyberfusion\CoreApi\CoreApiResource;
use Cyberfusion\CoreApi\Enums\TimeUnitEnum;
use Cyberfusion\CoreApi\Models\ClusterBorgPropertiesCreateRequest;
use Cyberfusion\CoreApi\Models\ClusterBorgPropertiesUpdateRequest;
use Cyberfusion\CoreApi\Models\ClusterCreateRequest;
use Cyberfusion\CoreApi\Models\ClusterElasticsearchPropertiesCreateRequest;
use Cyberfusion\CoreApi\Models\ClusterElasticsearchPropertiesUpdateRequest;
use Cyberfusion\CoreApi\Models\ClusterFirewallPropertiesCreateRequest;
use Cyberfusion\CoreApi\Models\ClusterFirewallPropertiesUpdateRequest;
use Cyberfusion\CoreApi\Models\ClusterGrafanaPropertiesCreateRequest;
use Cyberfusion\CoreApi\Models\ClusterGrafanaPropertiesUpdateRequest;
use Cyberfusion\CoreApi\Models\ClusterIpAddressCreateRequest;
use Cyberfusion\CoreApi\Models\ClusterKernelcarePropertiesCreateRequest;
use Cyberfusion\CoreApi\Models\ClusterKernelcarePropertiesUpdateRequest;
use Cyberfusion\CoreApi\Models\ClusterLoadBalancingPropertiesUpdateRequest;
use Cyberfusion\CoreApi\Models\ClusterMariadbPropertiesCreateRequest;
use Cyberfusion\CoreApi\Models\ClusterMariadbPropertiesUpdateRequest;
use Cyberfusion\CoreApi\Models\ClusterMeilisearchPropertiesCreateRequest;
use Cyberfusion\CoreApi\Models\ClusterMeilisearchPropertiesUpdateRequest;
use Cyberfusion\CoreApi\Models\ClusterMetabasePropertiesCreateRequest;
use Cyberfusion\CoreApi\Models\ClusterMetabasePropertiesUpdateRequest;
use Cyberfusion\CoreApi\Models\ClusterNewRelicPropertiesCreateRequest;
use Cyberfusion\CoreApi\Models\ClusterNewRelicPropertiesUpdateRequest;
use Cyberfusion\CoreApi\Models\ClusterNodejsPropertiesCreateRequest;
use Cyberfusion\CoreApi\Models\ClusterNodejsPropertiesUpdateRequest;
use Cyberfusion\CoreApi\Models\ClusterOsPropertiesCreateRequest;
use Cyberfusion\CoreApi\Models\ClusterOsPropertiesUpdateRequest;
use Cyberfusion\CoreApi\Models\ClusterPhpPropertiesCreateRequest;
use Cyberfusion\CoreApi\Models\ClusterPhpPropertiesUpdateRequest;
use Cyberfusion\CoreApi\Models\ClusterPostgresqlPropertiesCreateRequest;
use Cyberfusion\CoreApi\Models\ClusterPostgresqlPropertiesUpdateRequest;
use Cyberfusion\CoreApi\Models\ClusterRabbitmqPropertiesCreateRequest;
use Cyberfusion\CoreApi\Models\ClusterRabbitmqPropertiesUpdateRequest;
use Cyberfusion\CoreApi\Models\ClusterRedisPropertiesCreateRequest;
use Cyberfusion\CoreApi\Models\ClusterRedisPropertiesUpdateRequest;
use Cyberfusion\CoreApi\Models\ClusterSinglestorePropertiesCreateRequest;
use Cyberfusion\CoreApi\Models\ClusterSinglestorePropertiesUpdateRequest;
use Cyberfusion\CoreApi\Models\ClusterUpdateRequest;
use Cyberfusion\CoreApi\Models\ClustersBorgPropertiesSearchRequest;
use Cyberfusion\CoreApi\Models\ClustersElasticsearchPropertiesSearchRequest;
use Cyberfusion\CoreApi\Models\ClustersFirewallPropertiesSearchRequest;
use Cyberfusion\CoreApi\Models\ClustersGrafanaPropertiesSearchRequest;
use Cyberfusion\CoreApi\Models\ClustersKernelcarePropertiesSearchRequest;
use Cyberfusion\CoreApi\Models\ClustersLoadBalancingPropertiesSearchRequest;
use Cyberfusion\CoreApi\Models\ClustersMariadbPropertiesSearchRequest;
use Cyberfusion\CoreApi\Models\ClustersMeilisearchPropertiesSearchRequest;
use Cyberfusion\CoreApi\Models\ClustersMetabasePropertiesSearchRequest;
use Cyberfusion\CoreApi\Models\ClustersNewRelicPropertiesSearchRequest;
use Cyberfusion\CoreApi\Models\ClustersNodejsPropertiesSearchRequest;
use Cyberfusion\CoreApi\Models\ClustersOsPropertiesSearchRequest;
use Cyberfusion\CoreApi\Models\ClustersPhpPropertiesSearchRequest;
use Cyberfusion\CoreApi\Models\ClustersPostgresqlPropertiesSearchRequest;
use Cyberfusion\CoreApi\Models\ClustersRabbitmqPropertiesSearchRequest;
use Cyberfusion\CoreApi\Models\ClustersRedisPropertiesSearchRequest;
use Cyberfusion\CoreApi\Models\ClustersSearchRequest;
use Cyberfusion\CoreApi\Models\ClustersSinglestorePropertiesSearchRequest;
use Cyberfusion\CoreApi\Models\ClustersUnixUsersPropertiesSearchRequest;
use Cyberfusion\CoreApi\Requests\Clusters\CreateBorgProperties;
use Cyberfusion\CoreApi\Requests\Clusters\CreateCluster;
use Cyberfusion\CoreApi\Requests\Clusters\CreateElasticsearchProperties;
use Cyberfusion\CoreApi\Requests\Clusters\CreateFirewallProperties;
use Cyberfusion\CoreApi\Requests\Clusters\CreateGrafanaProperties;
use Cyberfusion\CoreApi\Requests\Clusters\CreateIpAddressForCluster;
use Cyberfusion\CoreApi\Requests\Clusters\CreateKernelcareProperties;
use Cyberfusion\CoreApi\Requests\Clusters\CreateMariadbProperties;
use Cyberfusion\CoreApi\Requests\Clusters\CreateMeilisearchProperties;
use Cyberfusion\CoreApi\Requests\Clusters\CreateMetabaseProperties;
use Cyberfusion\CoreApi\Requests\Clusters\CreateNewRelicProperties;
use Cyberfusion\CoreApi\Requests\Clusters\CreateNodejsProperties;
use Cyberfusion\CoreApi\Requests\Clusters\CreateOsProperties;
use Cyberfusion\CoreApi\Requests\Clusters\CreatePhpProperties;
use Cyberfusion\CoreApi\Requests\Clusters\CreatePostgresqlProperties;
use Cyberfusion\CoreApi\Requests\Clusters\CreateRabbitmqProperties;
use Cyberfusion\CoreApi\Requests\Clusters\CreateRedisProperties;
use Cyberfusion\CoreApi\Requests\Clusters\CreateSinglestoreProperties;
use Cyberfusion\CoreApi\Requests\Clusters\DeleteIpAddressForCluster;
use Cyberfusion\CoreApi\Requests\Clusters\DisableL3DdosProtectionForIpAddress;
use Cyberfusion\CoreApi\Requests\Clusters\EnableL3DdosProtectionForIpAddress;
use Cyberfusion\CoreApi\Requests\Clusters\GenerateInnodbReport;
use Cyberfusion\CoreApi\Requests\Clusters\GetCommonProperties;
use Cyberfusion\CoreApi\Requests\Clusters\GetIpAddressesProductsForClusters;
use Cyberfusion\CoreApi\Requests\Clusters\GetNodesDependencies;
use Cyberfusion\CoreApi\Requests\Clusters\GetNodesSpecifications;
use Cyberfusion\CoreApi\Requests\Clusters\ListAdvancedSpecifications;
use Cyberfusion\CoreApi\Requests\Clusters\ListBorgProperties;
use Cyberfusion\CoreApi\Requests\Clusters\ListClusterDeploymentsResults;
use Cyberfusion\CoreApi\Requests\Clusters\ListClusters;
use Cyberfusion\CoreApi\Requests\Clusters\ListElasticsearchProperties;
use Cyberfusion\CoreApi\Requests\Clusters\ListFirewallProperties;
use Cyberfusion\CoreApi\Requests\Clusters\ListGrafanaProperties;
use Cyberfusion\CoreApi\Requests\Clusters\ListIpAddressesForCluster;
use Cyberfusion\CoreApi\Requests\Clusters\ListKernelcareProperties;
use Cyberfusion\CoreApi\Requests\Clusters\ListLoadBalancingProperties;
use Cyberfusion\CoreApi\Requests\Clusters\ListMariadbProperties;
use Cyberfusion\CoreApi\Requests\Clusters\ListMeilisearchProperties;
use Cyberfusion\CoreApi\Requests\Clusters\ListMetabaseProperties;
use Cyberfusion\CoreApi\Requests\Clusters\ListNewRelicProperties;
use Cyberfusion\CoreApi\Requests\Clusters\ListNodejsProperties;
use Cyberfusion\CoreApi\Requests\Clusters\ListOsProperties;
use Cyberfusion\CoreApi\Requests\Clusters\ListPhpProperties;
use Cyberfusion\CoreApi\Requests\Clusters\ListPostgresqlProperties;
use Cyberfusion\CoreApi\Requests\Clusters\ListRabbitmqProperties;
use Cyberfusion\CoreApi\Requests\Clusters\ListRedisProperties;
use Cyberfusion\CoreApi\Requests\Clusters\ListSimpleSpecifications;
use Cyberfusion\CoreApi\Requests\Clusters\ListSinglestoreProperties;
use Cyberfusion\CoreApi\Requests\Clusters\ListUnixUsersHomeDirectoryUsages;
use Cyberfusion\CoreApi\Requests\Clusters\ListUnixUsersProperties;
use Cyberfusion\CoreApi\Requests\Clusters\ReadBorgProperties;
use Cyberfusion\CoreApi\Requests\Clusters\ReadCluster;
use Cyberfusion\CoreApi\Requests\Clusters\ReadElasticsearchProperties;
use Cyberfusion\CoreApi\Requests\Clusters\ReadFirewallProperties;
use Cyberfusion\CoreApi\Requests\Clusters\ReadGrafanaProperties;
use Cyberfusion\CoreApi\Requests\Clusters\ReadKernelcareProperties;
use Cyberfusion\CoreApi\Requests\Clusters\ReadLoadBalancingProperties;
use Cyberfusion\CoreApi\Requests\Clusters\ReadMariadbProperties;
use Cyberfusion\CoreApi\Requests\Clusters\ReadMeilisearchProperties;
use Cyberfusion\CoreApi\Requests\Clusters\ReadMetabaseProperties;
use Cyberfusion\CoreApi\Requests\Clusters\ReadNewRelicProperties;
use Cyberfusion\CoreApi\Requests\Clusters\ReadNodejsProperties;
use Cyberfusion\CoreApi\Requests\Clusters\ReadOsProperties;
use Cyberfusion\CoreApi\Requests\Clusters\ReadPhpProperties;
use Cyberfusion\CoreApi\Requests\Clusters\ReadPostgresqlProperties;
use Cyberfusion\CoreApi\Requests\Clusters\ReadRabbitmqProperties;
use Cyberfusion\CoreApi\Requests\Clusters\ReadRedisProperties;
use Cyberfusion\CoreApi\Requests\Clusters\ReadSinglestoreProperties;
use Cyberfusion\CoreApi\Requests\Clusters\ReadUnixUsersProperties;
use Cyberfusion\CoreApi\Requests\Clusters\UpdateBorgProperties;
use Cyberfusion\CoreApi\Requests\Clusters\UpdateCluster;
use Cyberfusion\CoreApi\Requests\Clusters\UpdateElasticsearchProperties;
use Cyberfusion\CoreApi\Requests\Clusters\UpdateFirewallProperties;
use Cyberfusion\CoreApi\Requests\Clusters\UpdateGrafanaProperties;
use Cyberfusion\CoreApi\Requests\Clusters\UpdateKernelcareProperties;
use Cyberfusion\CoreApi\Requests\Clusters\UpdateLoadBalancingProperties;
use Cyberfusion\CoreApi\Requests\Clusters\UpdateMariadbProperties;
use Cyberfusion\CoreApi\Requests\Clusters\UpdateMeilisearchProperties;
use Cyberfusion\CoreApi\Requests\Clusters\UpdateMetabaseProperties;
use Cyberfusion\CoreApi\Requests\Clusters\UpdateNewRelicProperties;
use Cyberfusion\CoreApi\Requests\Clusters\UpdateNodejsProperties;
use Cyberfusion\CoreApi\Requests\Clusters\UpdateOsProperties;
use Cyberfusion\CoreApi\Requests\Clusters\UpdatePhpProperties;
use Cyberfusion\CoreApi\Requests\Clusters\UpdatePostgresqlProperties;
use Cyberfusion\CoreApi\Requests\Clusters\UpdateRabbitmqProperties;
use Cyberfusion\CoreApi\Requests\Clusters\UpdateRedisProperties;
use Cyberfusion\CoreApi\Requests\Clusters\UpdateSinglestoreProperties;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\Paginator;

class Clusters extends CoreApiResource
{
    public function getCommonProperties(): Response
    {
        return $this->connector->send(new GetCommonProperties());
    }

    public function createCluster(ClusterCreateRequest $clusterCreateRequest, ?string $callbackUrl = null): Response
    {
        return $this->connector->send(new CreateCluster($clusterCreateRequest, $callbackUrl));
    }

    public function listClusters(?ClustersSearchRequest $includeFilters = null, array $includes = []): Paginator
    {
        return $this->connector->paginate(new ListClusters($includeFilters, $includes));
    }

    public function readCluster(int $id, array $includes = []): Response
    {
        return $this->connector->send(new ReadCluster($id, $includes));
    }

    public function updateCluster(int $id, ClusterUpdateRequest $clusterUpdateRequest): Response
    {
        return $this->connector->send(new UpdateCluster($id, $clusterUpdateRequest));
    }

    public function getNodesDependencies(int $id): Response
    {
        return $this->connector->send(new GetNodesDependencies($id));
    }

    public function listIpAddressesForCluster(int $id): Response
    {
        return $this->connector->send(new ListIpAddressesForCluster($id));
    }

    public function createIpAddressForCluster(
        int $id,
        ClusterIpAddressCreateRequest $clusterIpAddressCreateRequest,
        ?string $callbackUrl = null,
    ): Response {
        return $this->connector->send(new CreateIpAddressForCluster($id, $clusterIpAddressCreateRequest, $callbackUrl));
    }

    public function deleteIpAddressForCluster(int $id, string $ipAddress, ?string $callbackUrl = null): Response
    {
        return $this->connector->send(new DeleteIpAddressForCluster($id, $ipAddress, $callbackUrl));
    }

    public function enableL3DdosProtectionForIpAddress(
        int $id,
        string $ipAddress,
        ?string $callbackUrl = null,
    ): Response {
        return $this->connector->send(new EnableL3DdosProtectionForIpAddress($id, $ipAddress, $callbackUrl));
    }

    public function disableL3DdosProtectionForIpAddress(
        int $id,
        string $ipAddress,
        ?string $callbackUrl = null,
    ): Response {
        return $this->connector->send(new DisableL3DdosProtectionForIpAddress($id, $ipAddress, $callbackUrl));
    }

    public function getIpAddressesProductsForClusters(): Response
    {
        return $this->connector->send(new GetIpAddressesProductsForClusters());
    }

    public function listClusterDeploymentsResults(int $id, ?bool $getNonRunning = null): Response
    {
        return $this->connector->send(new ListClusterDeploymentsResults($id, $getNonRunning));
    }

    public function getNodesSpecifications(int $id): Response
    {
        return $this->connector->send(new GetNodesSpecifications($id));
    }

    public function listSimpleSpecifications(int $id): Response
    {
        return $this->connector->send(new ListSimpleSpecifications($id));
    }

    public function listAdvancedSpecifications(int $id): Response
    {
        return $this->connector->send(new ListAdvancedSpecifications($id));
    }

    public function createBorgProperties(
        int $id,
        ClusterBorgPropertiesCreateRequest $clusterBorgPropertiesCreateRequest,
    ): Response {
        return $this->connector->send(new CreateBorgProperties($id, $clusterBorgPropertiesCreateRequest));
    }

    public function readBorgProperties(int $id, array $includes = []): Response
    {
        return $this->connector->send(new ReadBorgProperties($id, $includes));
    }

    public function updateBorgProperties(
        int $id,
        ClusterBorgPropertiesUpdateRequest $clusterBorgPropertiesUpdateRequest,
    ): Response {
        return $this->connector->send(new UpdateBorgProperties($id, $clusterBorgPropertiesUpdateRequest));
    }

    public function listBorgProperties(
        ?ClustersBorgPropertiesSearchRequest $includeFilters = null,
        array $includes = [],
    ): Paginator {
        return $this->connector->paginate(new ListBorgProperties($includeFilters, $includes));
    }

    public function createKernelcareProperties(
        int $id,
        ClusterKernelcarePropertiesCreateRequest $clusterKernelcarePropertiesCreateRequest,
    ): Response {
        return $this->connector->send(new CreateKernelcareProperties($id, $clusterKernelcarePropertiesCreateRequest));
    }

    public function readKernelcareProperties(int $id, array $includes = []): Response
    {
        return $this->connector->send(new ReadKernelcareProperties($id, $includes));
    }

    public function updateKernelcareProperties(
        int $id,
        ClusterKernelcarePropertiesUpdateRequest $clusterKernelcarePropertiesUpdateRequest,
    ): Response {
        return $this->connector->send(new UpdateKernelcareProperties($id, $clusterKernelcarePropertiesUpdateRequest));
    }

    public function listKernelcareProperties(
        ?ClustersKernelcarePropertiesSearchRequest $includeFilters = null,
        array $includes = [],
    ): Paginator {
        return $this->connector->paginate(new ListKernelcareProperties($includeFilters, $includes));
    }

    public function createRedisProperties(
        int $id,
        ClusterRedisPropertiesCreateRequest $clusterRedisPropertiesCreateRequest,
    ): Response {
        return $this->connector->send(new CreateRedisProperties($id, $clusterRedisPropertiesCreateRequest));
    }

    public function readRedisProperties(int $id, array $includes = []): Response
    {
        return $this->connector->send(new ReadRedisProperties($id, $includes));
    }

    public function updateRedisProperties(
        int $id,
        ClusterRedisPropertiesUpdateRequest $clusterRedisPropertiesUpdateRequest,
    ): Response {
        return $this->connector->send(new UpdateRedisProperties($id, $clusterRedisPropertiesUpdateRequest));
    }

    public function listRedisProperties(
        ?ClustersRedisPropertiesSearchRequest $includeFilters = null,
        array $includes = [],
    ): Paginator {
        return $this->connector->paginate(new ListRedisProperties($includeFilters, $includes));
    }

    public function createGrafanaProperties(
        int $id,
        ClusterGrafanaPropertiesCreateRequest $clusterGrafanaPropertiesCreateRequest,
    ): Response {
        return $this->connector->send(new CreateGrafanaProperties($id, $clusterGrafanaPropertiesCreateRequest));
    }

    public function readGrafanaProperties(int $id, array $includes = []): Response
    {
        return $this->connector->send(new ReadGrafanaProperties($id, $includes));
    }

    public function updateGrafanaProperties(
        int $id,
        ClusterGrafanaPropertiesUpdateRequest $clusterGrafanaPropertiesUpdateRequest,
    ): Response {
        return $this->connector->send(new UpdateGrafanaProperties($id, $clusterGrafanaPropertiesUpdateRequest));
    }

    public function listGrafanaProperties(
        ?ClustersGrafanaPropertiesSearchRequest $includeFilters = null,
        array $includes = [],
    ): Paginator {
        return $this->connector->paginate(new ListGrafanaProperties($includeFilters, $includes));
    }

    public function createNodejsProperties(
        int $id,
        ClusterNodejsPropertiesCreateRequest $clusterNodejsPropertiesCreateRequest,
    ): Response {
        return $this->connector->send(new CreateNodejsProperties($id, $clusterNodejsPropertiesCreateRequest));
    }

    public function readNodejsProperties(int $id, array $includes = []): Response
    {
        return $this->connector->send(new ReadNodejsProperties($id, $includes));
    }

    public function updateNodejsProperties(
        int $id,
        ClusterNodejsPropertiesUpdateRequest $clusterNodejsPropertiesUpdateRequest,
    ): Response {
        return $this->connector->send(new UpdateNodejsProperties($id, $clusterNodejsPropertiesUpdateRequest));
    }

    public function listNodejsProperties(
        ?ClustersNodejsPropertiesSearchRequest $includeFilters = null,
        array $includes = [],
    ): Paginator {
        return $this->connector->paginate(new ListNodejsProperties($includeFilters, $includes));
    }

    public function createElasticsearchProperties(
        int $id,
        ClusterElasticsearchPropertiesCreateRequest $clusterElasticsearchPropertiesCreateRequest,
    ): Response {
        return $this->connector->send(new CreateElasticsearchProperties($id, $clusterElasticsearchPropertiesCreateRequest));
    }

    public function readElasticsearchProperties(int $id, array $includes = []): Response
    {
        return $this->connector->send(new ReadElasticsearchProperties($id, $includes));
    }

    public function updateElasticsearchProperties(
        int $id,
        ClusterElasticsearchPropertiesUpdateRequest $clusterElasticsearchPropertiesUpdateRequest,
    ): Response {
        return $this->connector->send(new UpdateElasticsearchProperties($id, $clusterElasticsearchPropertiesUpdateRequest));
    }

    public function listElasticsearchProperties(
        ?ClustersElasticsearchPropertiesSearchRequest $includeFilters = null,
        array $includes = [],
    ): Paginator {
        return $this->connector->paginate(new ListElasticsearchProperties($includeFilters, $includes));
    }

    public function createFirewallProperties(
        int $id,
        ClusterFirewallPropertiesCreateRequest $clusterFirewallPropertiesCreateRequest,
    ): Response {
        return $this->connector->send(new CreateFirewallProperties($id, $clusterFirewallPropertiesCreateRequest));
    }

    public function readFirewallProperties(int $id, array $includes = []): Response
    {
        return $this->connector->send(new ReadFirewallProperties($id, $includes));
    }

    public function updateFirewallProperties(
        int $id,
        ClusterFirewallPropertiesUpdateRequest $clusterFirewallPropertiesUpdateRequest,
    ): Response {
        return $this->connector->send(new UpdateFirewallProperties($id, $clusterFirewallPropertiesUpdateRequest));
    }

    public function listFirewallProperties(
        ?ClustersFirewallPropertiesSearchRequest $includeFilters = null,
        array $includes = [],
    ): Paginator {
        return $this->connector->paginate(new ListFirewallProperties($includeFilters, $includes));
    }

    public function createPostgresqlProperties(
        int $id,
        ClusterPostgresqlPropertiesCreateRequest $clusterPostgresqlPropertiesCreateRequest,
    ): Response {
        return $this->connector->send(new CreatePostgresqlProperties($id, $clusterPostgresqlPropertiesCreateRequest));
    }

    public function readPostgresqlProperties(int $id, array $includes = []): Response
    {
        return $this->connector->send(new ReadPostgresqlProperties($id, $includes));
    }

    public function updatePostgresqlProperties(
        int $id,
        ClusterPostgresqlPropertiesUpdateRequest $clusterPostgresqlPropertiesUpdateRequest,
    ): Response {
        return $this->connector->send(new UpdatePostgresqlProperties($id, $clusterPostgresqlPropertiesUpdateRequest));
    }

    public function listPostgresqlProperties(
        ?ClustersPostgresqlPropertiesSearchRequest $includeFilters = null,
        array $includes = [],
    ): Paginator {
        return $this->connector->paginate(new ListPostgresqlProperties($includeFilters, $includes));
    }

    public function readUnixUsersProperties(int $id, array $includes = []): Response
    {
        return $this->connector->send(new ReadUnixUsersProperties($id, $includes));
    }

    public function listUnixUsersProperties(
        ?ClustersUnixUsersPropertiesSearchRequest $includeFilters = null,
        array $includes = [],
    ): Paginator {
        return $this->connector->paginate(new ListUnixUsersProperties($includeFilters, $includes));
    }

    public function createMeilisearchProperties(
        int $id,
        ClusterMeilisearchPropertiesCreateRequest $clusterMeilisearchPropertiesCreateRequest,
    ): Response {
        return $this->connector->send(new CreateMeilisearchProperties($id, $clusterMeilisearchPropertiesCreateRequest));
    }

    public function readMeilisearchProperties(int $id, array $includes = []): Response
    {
        return $this->connector->send(new ReadMeilisearchProperties($id, $includes));
    }

    public function updateMeilisearchProperties(
        int $id,
        ClusterMeilisearchPropertiesUpdateRequest $clusterMeilisearchPropertiesUpdateRequest,
    ): Response {
        return $this->connector->send(new UpdateMeilisearchProperties($id, $clusterMeilisearchPropertiesUpdateRequest));
    }

    public function listMeilisearchProperties(
        ?ClustersMeilisearchPropertiesSearchRequest $includeFilters = null,
        array $includes = [],
    ): Paginator {
        return $this->connector->paginate(new ListMeilisearchProperties($includeFilters, $includes));
    }

    public function createMariadbProperties(
        int $id,
        ClusterMariadbPropertiesCreateRequest $clusterMariadbPropertiesCreateRequest,
    ): Response {
        return $this->connector->send(new CreateMariadbProperties($id, $clusterMariadbPropertiesCreateRequest));
    }

    public function readMariadbProperties(int $id, array $includes = []): Response
    {
        return $this->connector->send(new ReadMariadbProperties($id, $includes));
    }

    public function updateMariadbProperties(
        int $id,
        ClusterMariadbPropertiesUpdateRequest $clusterMariadbPropertiesUpdateRequest,
    ): Response {
        return $this->connector->send(new UpdateMariadbProperties($id, $clusterMariadbPropertiesUpdateRequest));
    }

    public function listMariadbProperties(
        ?ClustersMariadbPropertiesSearchRequest $includeFilters = null,
        array $includes = [],
    ): Paginator {
        return $this->connector->paginate(new ListMariadbProperties($includeFilters, $includes));
    }

    public function createMetabaseProperties(
        int $id,
        ClusterMetabasePropertiesCreateRequest $clusterMetabasePropertiesCreateRequest,
    ): Response {
        return $this->connector->send(new CreateMetabaseProperties($id, $clusterMetabasePropertiesCreateRequest));
    }

    public function readMetabaseProperties(int $id, array $includes = []): Response
    {
        return $this->connector->send(new ReadMetabaseProperties($id, $includes));
    }

    public function updateMetabaseProperties(
        int $id,
        ClusterMetabasePropertiesUpdateRequest $clusterMetabasePropertiesUpdateRequest,
    ): Response {
        return $this->connector->send(new UpdateMetabaseProperties($id, $clusterMetabasePropertiesUpdateRequest));
    }

    public function listMetabaseProperties(
        ?ClustersMetabasePropertiesSearchRequest $includeFilters = null,
        array $includes = [],
    ): Paginator {
        return $this->connector->paginate(new ListMetabaseProperties($includeFilters, $includes));
    }

    public function createNewRelicProperties(
        int $id,
        ClusterNewRelicPropertiesCreateRequest $clusterNewRelicPropertiesCreateRequest,
    ): Response {
        return $this->connector->send(new CreateNewRelicProperties($id, $clusterNewRelicPropertiesCreateRequest));
    }

    public function readNewRelicProperties(int $id, array $includes = []): Response
    {
        return $this->connector->send(new ReadNewRelicProperties($id, $includes));
    }

    public function updateNewRelicProperties(
        int $id,
        ClusterNewRelicPropertiesUpdateRequest $clusterNewRelicPropertiesUpdateRequest,
    ): Response {
        return $this->connector->send(new UpdateNewRelicProperties($id, $clusterNewRelicPropertiesUpdateRequest));
    }

    public function listNewRelicProperties(
        ?ClustersNewRelicPropertiesSearchRequest $includeFilters = null,
        array $includes = [],
    ): Paginator {
        return $this->connector->paginate(new ListNewRelicProperties($includeFilters, $includes));
    }

    public function createRabbitmqProperties(
        int $id,
        ClusterRabbitmqPropertiesCreateRequest $clusterRabbitmqPropertiesCreateRequest,
    ): Response {
        return $this->connector->send(new CreateRabbitmqProperties($id, $clusterRabbitmqPropertiesCreateRequest));
    }

    public function readRabbitmqProperties(int $id, array $includes = []): Response
    {
        return $this->connector->send(new ReadRabbitmqProperties($id, $includes));
    }

    public function updateRabbitmqProperties(
        int $id,
        ClusterRabbitmqPropertiesUpdateRequest $clusterRabbitmqPropertiesUpdateRequest,
    ): Response {
        return $this->connector->send(new UpdateRabbitmqProperties($id, $clusterRabbitmqPropertiesUpdateRequest));
    }

    public function listRabbitmqProperties(
        ?ClustersRabbitmqPropertiesSearchRequest $includeFilters = null,
        array $includes = [],
    ): Paginator {
        return $this->connector->paginate(new ListRabbitmqProperties($includeFilters, $includes));
    }

    public function createPhpProperties(
        int $id,
        ClusterPhpPropertiesCreateRequest $clusterPhpPropertiesCreateRequest,
    ): Response {
        return $this->connector->send(new CreatePhpProperties($id, $clusterPhpPropertiesCreateRequest));
    }

    public function readPhpProperties(int $id, array $includes = []): Response
    {
        return $this->connector->send(new ReadPhpProperties($id, $includes));
    }

    public function updatePhpProperties(
        int $id,
        ClusterPhpPropertiesUpdateRequest $clusterPhpPropertiesUpdateRequest,
    ): Response {
        return $this->connector->send(new UpdatePhpProperties($id, $clusterPhpPropertiesUpdateRequest));
    }

    public function listPhpProperties(
        ?ClustersPhpPropertiesSearchRequest $includeFilters = null,
        array $includes = [],
    ): Paginator {
        return $this->connector->paginate(new ListPhpProperties($includeFilters, $includes));
    }

    public function readLoadBalancingProperties(int $id, array $includes = []): Response
    {
        return $this->connector->send(new ReadLoadBalancingProperties($id, $includes));
    }

    public function updateLoadBalancingProperties(
        int $id,
        ClusterLoadBalancingPropertiesUpdateRequest $clusterLoadBalancingPropertiesUpdateRequest,
    ): Response {
        return $this->connector->send(new UpdateLoadBalancingProperties($id, $clusterLoadBalancingPropertiesUpdateRequest));
    }

    public function listLoadBalancingProperties(
        ?ClustersLoadBalancingPropertiesSearchRequest $includeFilters = null,
        array $includes = [],
    ): Paginator {
        return $this->connector->paginate(new ListLoadBalancingProperties($includeFilters, $includes));
    }

    public function createOsProperties(
        int $id,
        ClusterOsPropertiesCreateRequest $clusterOsPropertiesCreateRequest,
    ): Response {
        return $this->connector->send(new CreateOsProperties($id, $clusterOsPropertiesCreateRequest));
    }

    public function readOsProperties(int $id, array $includes = []): Response
    {
        return $this->connector->send(new ReadOsProperties($id, $includes));
    }

    public function updateOsProperties(
        int $id,
        ClusterOsPropertiesUpdateRequest $clusterOsPropertiesUpdateRequest,
    ): Response {
        return $this->connector->send(new UpdateOsProperties($id, $clusterOsPropertiesUpdateRequest));
    }

    public function listOsProperties(
        ?ClustersOsPropertiesSearchRequest $includeFilters = null,
        array $includes = [],
    ): Paginator {
        return $this->connector->paginate(new ListOsProperties($includeFilters, $includes));
    }

    public function createSinglestoreProperties(
        int $id,
        ClusterSinglestorePropertiesCreateRequest $clusterSinglestorePropertiesCreateRequest,
    ): Response {
        return $this->connector->send(new CreateSinglestoreProperties($id, $clusterSinglestorePropertiesCreateRequest));
    }

    public function readSinglestoreProperties(int $id, array $includes = []): Response
    {
        return $this->connector->send(new ReadSinglestoreProperties($id, $includes));
    }

    public function updateSinglestoreProperties(
        int $id,
        ClusterSinglestorePropertiesUpdateRequest $clusterSinglestorePropertiesUpdateRequest,
    ): Response {
        return $this->connector->send(new UpdateSinglestoreProperties($id, $clusterSinglestorePropertiesUpdateRequest));
    }

    public function listSinglestoreProperties(
        ?ClustersSinglestorePropertiesSearchRequest $includeFilters = null,
        array $includes = [],
    ): Paginator {
        return $this->connector->paginate(new ListSinglestoreProperties($includeFilters, $includes));
    }

    public function generateInnodbReport(int $id): Response
    {
        return $this->connector->send(new GenerateInnodbReport($id));
    }

    public function listUnixUsersHomeDirectoryUsages(
        int $id,
        string $timestamp,
        ?TimeUnitEnum $timeUnit = null,
        array $includes = [],
    ): Response {
        return $this->connector->send(new ListUnixUsersHomeDirectoryUsages($id, $timestamp, $timeUnit, $includes));
    }
}
