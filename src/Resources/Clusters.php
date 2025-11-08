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
use Cyberfusion\CoreApi\Models\ClusterIPAddressCreateRequest;
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
use Cyberfusion\CoreApi\Requests\Clusters\CreateIPAddressForCluster;
use Cyberfusion\CoreApi\Requests\Clusters\CreateKernelCareProperties;
use Cyberfusion\CoreApi\Requests\Clusters\CreateMariaDBProperties;
use Cyberfusion\CoreApi\Requests\Clusters\CreateMeilisearchProperties;
use Cyberfusion\CoreApi\Requests\Clusters\CreateMetabaseProperties;
use Cyberfusion\CoreApi\Requests\Clusters\CreateNewRelicProperties;
use Cyberfusion\CoreApi\Requests\Clusters\CreateNodeJSProperties;
use Cyberfusion\CoreApi\Requests\Clusters\CreateOSProperties;
use Cyberfusion\CoreApi\Requests\Clusters\CreatePHPProperties;
use Cyberfusion\CoreApi\Requests\Clusters\CreatePostgreSQLProperties;
use Cyberfusion\CoreApi\Requests\Clusters\CreateRabbitMQProperties;
use Cyberfusion\CoreApi\Requests\Clusters\CreateRedisProperties;
use Cyberfusion\CoreApi\Requests\Clusters\CreateSingleStoreProperties;
use Cyberfusion\CoreApi\Requests\Clusters\DeleteIPAddressForCluster;
use Cyberfusion\CoreApi\Requests\Clusters\DisableL3DDoSProtectionForIPAddress;
use Cyberfusion\CoreApi\Requests\Clusters\EnableL3DDoSProtectionForIPAddress;
use Cyberfusion\CoreApi\Requests\Clusters\GenerateInnoDBReport;
use Cyberfusion\CoreApi\Requests\Clusters\GetCommonProperties;
use Cyberfusion\CoreApi\Requests\Clusters\GetIPAddressesProductsForClusters;
use Cyberfusion\CoreApi\Requests\Clusters\GetNodesDependencies;
use Cyberfusion\CoreApi\Requests\Clusters\GetNodesSpecifications;
use Cyberfusion\CoreApi\Requests\Clusters\ListAdvancedSpecifications;
use Cyberfusion\CoreApi\Requests\Clusters\ListBorgProperties;
use Cyberfusion\CoreApi\Requests\Clusters\ListClusterDeploymentsResults;
use Cyberfusion\CoreApi\Requests\Clusters\ListClusters;
use Cyberfusion\CoreApi\Requests\Clusters\ListElasticsearchProperties;
use Cyberfusion\CoreApi\Requests\Clusters\ListFirewallProperties;
use Cyberfusion\CoreApi\Requests\Clusters\ListGrafanaProperties;
use Cyberfusion\CoreApi\Requests\Clusters\ListIPAddressesForCluster;
use Cyberfusion\CoreApi\Requests\Clusters\ListKernelCareProperties;
use Cyberfusion\CoreApi\Requests\Clusters\ListLoadBalancingProperties;
use Cyberfusion\CoreApi\Requests\Clusters\ListMariaDBProperties;
use Cyberfusion\CoreApi\Requests\Clusters\ListMeilisearchProperties;
use Cyberfusion\CoreApi\Requests\Clusters\ListMetabaseProperties;
use Cyberfusion\CoreApi\Requests\Clusters\ListNewRelicProperties;
use Cyberfusion\CoreApi\Requests\Clusters\ListNodeJSProperties;
use Cyberfusion\CoreApi\Requests\Clusters\ListOSProperties;
use Cyberfusion\CoreApi\Requests\Clusters\ListPHPProperties;
use Cyberfusion\CoreApi\Requests\Clusters\ListPostgreSQLProperties;
use Cyberfusion\CoreApi\Requests\Clusters\ListRabbitMQProperties;
use Cyberfusion\CoreApi\Requests\Clusters\ListRedisProperties;
use Cyberfusion\CoreApi\Requests\Clusters\ListSimpleSpecifications;
use Cyberfusion\CoreApi\Requests\Clusters\ListSingleStoreProperties;
use Cyberfusion\CoreApi\Requests\Clusters\ListUNIXUsersHomeDirectoryUsages;
use Cyberfusion\CoreApi\Requests\Clusters\ListUNIXUsersProperties;
use Cyberfusion\CoreApi\Requests\Clusters\ReadBorgProperties;
use Cyberfusion\CoreApi\Requests\Clusters\ReadCluster;
use Cyberfusion\CoreApi\Requests\Clusters\ReadElasticsearchProperties;
use Cyberfusion\CoreApi\Requests\Clusters\ReadFirewallProperties;
use Cyberfusion\CoreApi\Requests\Clusters\ReadGrafanaProperties;
use Cyberfusion\CoreApi\Requests\Clusters\ReadKernelCareProperties;
use Cyberfusion\CoreApi\Requests\Clusters\ReadLoadBalancingProperties;
use Cyberfusion\CoreApi\Requests\Clusters\ReadMariaDBProperties;
use Cyberfusion\CoreApi\Requests\Clusters\ReadMeilisearchProperties;
use Cyberfusion\CoreApi\Requests\Clusters\ReadMetabaseProperties;
use Cyberfusion\CoreApi\Requests\Clusters\ReadNewRelicProperties;
use Cyberfusion\CoreApi\Requests\Clusters\ReadNodeJSProperties;
use Cyberfusion\CoreApi\Requests\Clusters\ReadOSProperties;
use Cyberfusion\CoreApi\Requests\Clusters\ReadPHPProperties;
use Cyberfusion\CoreApi\Requests\Clusters\ReadPostgreSQLProperties;
use Cyberfusion\CoreApi\Requests\Clusters\ReadRabbitMQProperties;
use Cyberfusion\CoreApi\Requests\Clusters\ReadRedisProperties;
use Cyberfusion\CoreApi\Requests\Clusters\ReadSingleStoreProperties;
use Cyberfusion\CoreApi\Requests\Clusters\ReadUNIXUsersProperties;
use Cyberfusion\CoreApi\Requests\Clusters\UpdateBorgProperties;
use Cyberfusion\CoreApi\Requests\Clusters\UpdateCluster;
use Cyberfusion\CoreApi\Requests\Clusters\UpdateElasticsearchProperties;
use Cyberfusion\CoreApi\Requests\Clusters\UpdateFirewallProperties;
use Cyberfusion\CoreApi\Requests\Clusters\UpdateGrafanaProperties;
use Cyberfusion\CoreApi\Requests\Clusters\UpdateKernelCareProperties;
use Cyberfusion\CoreApi\Requests\Clusters\UpdateLoadBalancingProperties;
use Cyberfusion\CoreApi\Requests\Clusters\UpdateMariaDBProperties;
use Cyberfusion\CoreApi\Requests\Clusters\UpdateMeilisearchProperties;
use Cyberfusion\CoreApi\Requests\Clusters\UpdateMetabaseProperties;
use Cyberfusion\CoreApi\Requests\Clusters\UpdateNewRelicProperties;
use Cyberfusion\CoreApi\Requests\Clusters\UpdateNodeJSProperties;
use Cyberfusion\CoreApi\Requests\Clusters\UpdateOSProperties;
use Cyberfusion\CoreApi\Requests\Clusters\UpdatePHPProperties;
use Cyberfusion\CoreApi\Requests\Clusters\UpdatePostgreSQLProperties;
use Cyberfusion\CoreApi\Requests\Clusters\UpdateRabbitMQProperties;
use Cyberfusion\CoreApi\Requests\Clusters\UpdateRedisProperties;
use Cyberfusion\CoreApi\Requests\Clusters\UpdateSingleStoreProperties;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\Paginator;

class Clusters extends CoreApiResource
{
    public function getCommonProperties(string $baseUrl): Response
    {
        return $this->connector->send(new GetCommonProperties($baseUrl));
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

    public function listIPAddressesForCluster(int $id): Response
    {
        return $this->connector->send(new ListIPAddressesForCluster($id));
    }

    public function createIPAddressForCluster(
        int $id,
        ClusterIPAddressCreateRequest $clusterIPAddressCreateRequest,
        ?string $callbackUrl = null,
    ): Response {
        return $this->connector->send(new CreateIPAddressForCluster($id, $clusterIPAddressCreateRequest, $callbackUrl));
    }

    public function deleteIPAddressForCluster(int $id, string $ipAddress, ?string $callbackUrl = null): Response
    {
        return $this->connector->send(new DeleteIPAddressForCluster($id, $ipAddress, $callbackUrl));
    }

    public function enableL3DDoSProtectionForIPAddress(
        int $id,
        string $ipAddress,
        ?string $callbackUrl = null,
    ): Response {
        return $this->connector->send(new EnableL3DDoSProtectionForIPAddress($id, $ipAddress, $callbackUrl));
    }

    public function disableL3DDoSProtectionForIPAddress(
        int $id,
        string $ipAddress,
        ?string $callbackUrl = null,
    ): Response {
        return $this->connector->send(new DisableL3DDoSProtectionForIPAddress($id, $ipAddress, $callbackUrl));
    }

    public function getIPAddressesProductsForClusters(string $baseUrl): Response
    {
        return $this->connector->send(new GetIPAddressesProductsForClusters($baseUrl));
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

    public function createKernelCareProperties(
        int $id,
        ClusterKernelcarePropertiesCreateRequest $clusterKernelcarePropertiesCreateRequest,
    ): Response {
        return $this->connector->send(new CreateKernelCareProperties($id, $clusterKernelcarePropertiesCreateRequest));
    }

    public function readKernelCareProperties(int $id, array $includes = []): Response
    {
        return $this->connector->send(new ReadKernelCareProperties($id, $includes));
    }

    public function updateKernelCareProperties(
        int $id,
        ClusterKernelcarePropertiesUpdateRequest $clusterKernelcarePropertiesUpdateRequest,
    ): Response {
        return $this->connector->send(new UpdateKernelCareProperties($id, $clusterKernelcarePropertiesUpdateRequest));
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

    public function createNodeJSProperties(
        int $id,
        ClusterNodejsPropertiesCreateRequest $clusterNodejsPropertiesCreateRequest,
    ): Response {
        return $this->connector->send(new CreateNodeJSProperties($id, $clusterNodejsPropertiesCreateRequest));
    }

    public function readNodeJSProperties(int $id, array $includes = []): Response
    {
        return $this->connector->send(new ReadNodeJSProperties($id, $includes));
    }

    public function updateNodeJSProperties(
        int $id,
        ClusterNodejsPropertiesUpdateRequest $clusterNodejsPropertiesUpdateRequest,
    ): Response {
        return $this->connector->send(new UpdateNodeJSProperties($id, $clusterNodejsPropertiesUpdateRequest));
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

    public function createPostgreSQLProperties(
        int $id,
        ClusterPostgresqlPropertiesCreateRequest $clusterPostgresqlPropertiesCreateRequest,
    ): Response {
        return $this->connector->send(new CreatePostgreSQLProperties($id, $clusterPostgresqlPropertiesCreateRequest));
    }

    public function readPostgreSQLProperties(int $id, array $includes = []): Response
    {
        return $this->connector->send(new ReadPostgreSQLProperties($id, $includes));
    }

    public function updatePostgreSQLProperties(
        int $id,
        ClusterPostgresqlPropertiesUpdateRequest $clusterPostgresqlPropertiesUpdateRequest,
    ): Response {
        return $this->connector->send(new UpdatePostgreSQLProperties($id, $clusterPostgresqlPropertiesUpdateRequest));
    }

    public function readUNIXUsersProperties(int $id, array $includes = []): Response
    {
        return $this->connector->send(new ReadUNIXUsersProperties($id, $includes));
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

    public function createMariaDBProperties(
        int $id,
        ClusterMariadbPropertiesCreateRequest $clusterMariadbPropertiesCreateRequest,
    ): Response {
        return $this->connector->send(new CreateMariaDBProperties($id, $clusterMariadbPropertiesCreateRequest));
    }

    public function readMariaDBProperties(int $id, array $includes = []): Response
    {
        return $this->connector->send(new ReadMariaDBProperties($id, $includes));
    }

    public function updateMariaDBProperties(
        int $id,
        ClusterMariadbPropertiesUpdateRequest $clusterMariadbPropertiesUpdateRequest,
    ): Response {
        return $this->connector->send(new UpdateMariaDBProperties($id, $clusterMariadbPropertiesUpdateRequest));
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

    public function createRabbitMQProperties(
        int $id,
        ClusterRabbitmqPropertiesCreateRequest $clusterRabbitmqPropertiesCreateRequest,
    ): Response {
        return $this->connector->send(new CreateRabbitMQProperties($id, $clusterRabbitmqPropertiesCreateRequest));
    }

    public function readRabbitMQProperties(int $id, array $includes = []): Response
    {
        return $this->connector->send(new ReadRabbitMQProperties($id, $includes));
    }

    public function updateRabbitMQProperties(
        int $id,
        ClusterRabbitmqPropertiesUpdateRequest $clusterRabbitmqPropertiesUpdateRequest,
    ): Response {
        return $this->connector->send(new UpdateRabbitMQProperties($id, $clusterRabbitmqPropertiesUpdateRequest));
    }

    public function createPHPProperties(
        int $id,
        ClusterPhpPropertiesCreateRequest $clusterPhpPropertiesCreateRequest,
    ): Response {
        return $this->connector->send(new CreatePHPProperties($id, $clusterPhpPropertiesCreateRequest));
    }

    public function readPHPProperties(int $id, array $includes = []): Response
    {
        return $this->connector->send(new ReadPHPProperties($id, $includes));
    }

    public function updatePHPProperties(
        int $id,
        ClusterPhpPropertiesUpdateRequest $clusterPhpPropertiesUpdateRequest,
    ): Response {
        return $this->connector->send(new UpdatePHPProperties($id, $clusterPhpPropertiesUpdateRequest));
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

    public function createOSProperties(
        int $id,
        ClusterOsPropertiesCreateRequest $clusterOsPropertiesCreateRequest,
    ): Response {
        return $this->connector->send(new CreateOSProperties($id, $clusterOsPropertiesCreateRequest));
    }

    public function readOSProperties(int $id, array $includes = []): Response
    {
        return $this->connector->send(new ReadOSProperties($id, $includes));
    }

    public function updateOSProperties(
        int $id,
        ClusterOsPropertiesUpdateRequest $clusterOsPropertiesUpdateRequest,
    ): Response {
        return $this->connector->send(new UpdateOSProperties($id, $clusterOsPropertiesUpdateRequest));
    }

    public function listBorgProperties(
        ?ClustersBorgPropertiesSearchRequest $includeFilters = null,
        array $includes = [],
    ): Paginator {
        return $this->connector->paginate(new ListBorgProperties($includeFilters, $includes));
    }

    public function listKernelCareProperties(
        ?ClustersKernelcarePropertiesSearchRequest $includeFilters = null,
        array $includes = [],
    ): Paginator {
        return $this->connector->paginate(new ListKernelCareProperties($includeFilters, $includes));
    }

    public function listRedisProperties(
        ?ClustersRedisPropertiesSearchRequest $includeFilters = null,
        array $includes = [],
    ): Paginator {
        return $this->connector->paginate(new ListRedisProperties($includeFilters, $includes));
    }

    public function listGrafanaProperties(
        ?ClustersGrafanaPropertiesSearchRequest $includeFilters = null,
        array $includes = [],
    ): Paginator {
        return $this->connector->paginate(new ListGrafanaProperties($includeFilters, $includes));
    }

    public function listNodeJSProperties(
        ?ClustersNodejsPropertiesSearchRequest $includeFilters = null,
        array $includes = [],
    ): Paginator {
        return $this->connector->paginate(new ListNodeJSProperties($includeFilters, $includes));
    }

    public function listElasticsearchProperties(
        ?ClustersElasticsearchPropertiesSearchRequest $includeFilters = null,
        array $includes = [],
    ): Paginator {
        return $this->connector->paginate(new ListElasticsearchProperties($includeFilters, $includes));
    }

    public function listFirewallProperties(
        ?ClustersFirewallPropertiesSearchRequest $includeFilters = null,
        array $includes = [],
    ): Paginator {
        return $this->connector->paginate(new ListFirewallProperties($includeFilters, $includes));
    }

    public function listPostgreSQLProperties(
        ?ClustersPostgresqlPropertiesSearchRequest $includeFilters = null,
        array $includes = [],
    ): Paginator {
        return $this->connector->paginate(new ListPostgreSQLProperties($includeFilters, $includes));
    }

    public function listMariaDBProperties(
        ?ClustersMariadbPropertiesSearchRequest $includeFilters = null,
        array $includes = [],
    ): Paginator {
        return $this->connector->paginate(new ListMariaDBProperties($includeFilters, $includes));
    }

    public function listUNIXUsersProperties(
        ?ClustersUnixUsersPropertiesSearchRequest $includeFilters = null,
        array $includes = [],
    ): Paginator {
        return $this->connector->paginate(new ListUNIXUsersProperties($includeFilters, $includes));
    }

    public function listMeilisearchProperties(
        ?ClustersMeilisearchPropertiesSearchRequest $includeFilters = null,
        array $includes = [],
    ): Paginator {
        return $this->connector->paginate(new ListMeilisearchProperties($includeFilters, $includes));
    }

    public function listMetabaseProperties(
        ?ClustersMetabasePropertiesSearchRequest $includeFilters = null,
        array $includes = [],
    ): Paginator {
        return $this->connector->paginate(new ListMetabaseProperties($includeFilters, $includes));
    }

    public function listNewRelicProperties(
        ?ClustersNewRelicPropertiesSearchRequest $includeFilters = null,
        array $includes = [],
    ): Paginator {
        return $this->connector->paginate(new ListNewRelicProperties($includeFilters, $includes));
    }

    public function listRabbitMQProperties(
        ?ClustersRabbitmqPropertiesSearchRequest $includeFilters = null,
        array $includes = [],
    ): Paginator {
        return $this->connector->paginate(new ListRabbitMQProperties($includeFilters, $includes));
    }

    public function listPHPProperties(
        ?ClustersPhpPropertiesSearchRequest $includeFilters = null,
        array $includes = [],
    ): Paginator {
        return $this->connector->paginate(new ListPHPProperties($includeFilters, $includes));
    }

    public function listLoadBalancingProperties(
        ?ClustersLoadBalancingPropertiesSearchRequest $includeFilters = null,
        array $includes = [],
    ): Paginator {
        return $this->connector->paginate(new ListLoadBalancingProperties($includeFilters, $includes));
    }

    public function listOSProperties(
        ?ClustersOsPropertiesSearchRequest $includeFilters = null,
        array $includes = [],
    ): Paginator {
        return $this->connector->paginate(new ListOSProperties($includeFilters, $includes));
    }

    public function listSingleStoreProperties(
        ?ClustersSinglestorePropertiesSearchRequest $includeFilters = null,
        array $includes = [],
    ): Paginator {
        return $this->connector->paginate(new ListSingleStoreProperties($includeFilters, $includes));
    }

    public function createSingleStoreProperties(
        int $id,
        ClusterSinglestorePropertiesCreateRequest $clusterSinglestorePropertiesCreateRequest,
    ): Response {
        return $this->connector->send(new CreateSingleStoreProperties($id, $clusterSinglestorePropertiesCreateRequest));
    }

    public function readSingleStoreProperties(int $id, array $includes = []): Response
    {
        return $this->connector->send(new ReadSingleStoreProperties($id, $includes));
    }

    public function updateSingleStoreProperties(
        int $id,
        ClusterSinglestorePropertiesUpdateRequest $clusterSinglestorePropertiesUpdateRequest,
    ): Response {
        return $this->connector->send(new UpdateSingleStoreProperties($id, $clusterSinglestorePropertiesUpdateRequest));
    }

    public function generateInnoDBReport(int $id): Response
    {
        return $this->connector->send(new GenerateInnoDBReport($id));
    }

    public function listUNIXUsersHomeDirectoryUsages(
        int $id,
        string $timestamp,
        ?TimeUnitEnum $timeUnit = null,
        array $includes = [],
    ): Response {
        return $this->connector->send(new ListUNIXUsersHomeDirectoryUsages($id, $timestamp, $timeUnit, $includes));
    }
}
