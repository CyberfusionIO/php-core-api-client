<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Enums\LoadBalancingMethodEnum;
use Cyberfusion\CoreApi\Enums\MeilisearchEnvironmentEnum;
use Cyberfusion\CoreApi\Enums\UNIXUserHomeDirectoryEnum;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Cyberfusion\CoreApi\Support\ValidationHelper;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class ClusterResource extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(
        int $id,
        string $createdAt,
        string $updatedAt,
        string $name,
        int $customerId,
        int $siteId,
        PHPSettings $phpSettings,
        bool $phpIoncubeEnabled,
        bool $phpSessionsSpreadEnabled,
        string $description,
        bool $wordpressToolkitEnabled,
        bool $automaticBorgRepositoriesPruneEnabled,
        bool $syncToolkitEnabled,
        bool $bubblewrapToolkitEnabled,
        bool $automaticUpgradesEnabled,
        bool $firewallRulesExternalProvidersEnabled,
        bool $databaseToolkitEnabled,
        ?UNIXUserHomeDirectoryEnum $unixUsersHomeDirectory = null,
        ?LoadBalancingMethodEnum $loadBalancingMethod = null,
        ?string $mariadbVersion = null,
        ?int $nodejsVersion = null,
        ?int $postgresqlVersion = null,
        ?string $mariadbClusterName = null,
        ?string $kernelcareLicenseKey = null,
        ?string $redisPassword = null,
        ?int $redisMemoryLimit = null,
        ?int $mariadbBackupInterval = null,
        ?int $mariadbBackupLocalRetention = null,
        ?int $postgresqlBackupLocalRetention = null,
        ?int $meilisearchBackupLocalRetention = null,
        ?string $newRelicMariadbPassword = null,
        ?string $newRelicApmLicenseKey = null,
        ?string $newRelicInfrastructureLicenseKey = null,
        ?string $meilisearchMasterKey = null,
        ?MeilisearchEnvironmentEnum $meilisearchEnvironment = null,
        ?int $meilisearchBackupInterval = null,
        ?int $postgresqlBackupInterval = null,
        ?HTTPRetryProperties $httpRetryProperties = null,
        ?string $grafanaDomain = null,
        ?string $singlestoreStudioDomain = null,
        ?string $singlestoreApiDomain = null,
        ?string $singlestoreLicenseKey = null,
        ?string $singlestoreRootPassword = null,
        ?string $elasticsearchDefaultUsersPassword = null,
        ?string $rabbitmqErlangCookie = null,
        ?string $rabbitmqAdminPassword = null,
        ?string $metabaseDomain = null,
        ?string $metabaseDatabasePassword = null,
        ?string $kibanaDomain = null,
        ?string $rabbitmqManagementDomain = null,
    ) {
        $this->setId($id);
        $this->setCreatedAt($createdAt);
        $this->setUpdatedAt($updatedAt);
        $this->setName($name);
        $this->setCustomerId($customerId);
        $this->setSiteId($siteId);
        $this->setPhpSettings($phpSettings);
        $this->setPhpIoncubeEnabled($phpIoncubeEnabled);
        $this->setPhpSessionsSpreadEnabled($phpSessionsSpreadEnabled);
        $this->setDescription($description);
        $this->setWordpressToolkitEnabled($wordpressToolkitEnabled);
        $this->setAutomaticBorgRepositoriesPruneEnabled($automaticBorgRepositoriesPruneEnabled);
        $this->setSyncToolkitEnabled($syncToolkitEnabled);
        $this->setBubblewrapToolkitEnabled($bubblewrapToolkitEnabled);
        $this->setAutomaticUpgradesEnabled($automaticUpgradesEnabled);
        $this->setFirewallRulesExternalProvidersEnabled($firewallRulesExternalProvidersEnabled);
        $this->setDatabaseToolkitEnabled($databaseToolkitEnabled);
        $this->setUnixUsersHomeDirectory($unixUsersHomeDirectory);
        $this->setLoadBalancingMethod($loadBalancingMethod);
        $this->setMariadbVersion($mariadbVersion);
        $this->setNodejsVersion($nodejsVersion);
        $this->setPostgresqlVersion($postgresqlVersion);
        $this->setMariadbClusterName($mariadbClusterName);
        $this->setKernelcareLicenseKey($kernelcareLicenseKey);
        $this->setRedisPassword($redisPassword);
        $this->setRedisMemoryLimit($redisMemoryLimit);
        $this->setMariadbBackupInterval($mariadbBackupInterval);
        $this->setMariadbBackupLocalRetention($mariadbBackupLocalRetention);
        $this->setPostgresqlBackupLocalRetention($postgresqlBackupLocalRetention);
        $this->setMeilisearchBackupLocalRetention($meilisearchBackupLocalRetention);
        $this->setNewRelicMariadbPassword($newRelicMariadbPassword);
        $this->setNewRelicApmLicenseKey($newRelicApmLicenseKey);
        $this->setNewRelicInfrastructureLicenseKey($newRelicInfrastructureLicenseKey);
        $this->setMeilisearchMasterKey($meilisearchMasterKey);
        $this->setMeilisearchEnvironment($meilisearchEnvironment);
        $this->setMeilisearchBackupInterval($meilisearchBackupInterval);
        $this->setPostgresqlBackupInterval($postgresqlBackupInterval);
        $this->setHttpRetryProperties($httpRetryProperties);
        $this->setGrafanaDomain($grafanaDomain);
        $this->setSinglestoreStudioDomain($singlestoreStudioDomain);
        $this->setSinglestoreApiDomain($singlestoreApiDomain);
        $this->setSinglestoreLicenseKey($singlestoreLicenseKey);
        $this->setSinglestoreRootPassword($singlestoreRootPassword);
        $this->setElasticsearchDefaultUsersPassword($elasticsearchDefaultUsersPassword);
        $this->setRabbitmqErlangCookie($rabbitmqErlangCookie);
        $this->setRabbitmqAdminPassword($rabbitmqAdminPassword);
        $this->setMetabaseDomain($metabaseDomain);
        $this->setMetabaseDatabasePassword($metabaseDatabasePassword);
        $this->setKibanaDomain($kibanaDomain);
        $this->setRabbitmqManagementDomain($rabbitmqManagementDomain);
    }

    public function getId(): int
    {
        return $this->getAttribute('id');
    }

    public function setId(?int $id = null): self
    {
        $this->setAttribute('id', $id);
        return $this;
    }

    public function getCreatedAt(): string
    {
        return $this->getAttribute('createdAt');
    }

    public function setCreatedAt(?string $createdAt = null): self
    {
        $this->setAttribute('createdAt', $createdAt);
        return $this;
    }

    public function getUpdatedAt(): string
    {
        return $this->getAttribute('updatedAt');
    }

    public function setUpdatedAt(?string $updatedAt = null): self
    {
        $this->setAttribute('updatedAt', $updatedAt);
        return $this;
    }

    public function getName(): string
    {
        return $this->getAttribute('name');
    }

    /**
     * @throws ValidationException
     */
    public function setName(?string $name = null): self
    {
        Validator::create()
            ->length(min: 1, max: 64)
            ->regex('/^[a-z0-9-.]+$/')
            ->assert($name);
        $this->setAttribute('name', $name);
        return $this;
    }

    public function getCustomerId(): int
    {
        return $this->getAttribute('customerId');
    }

    public function setCustomerId(?int $customerId = null): self
    {
        $this->setAttribute('customerId', $customerId);
        return $this;
    }

    public function getSiteId(): int
    {
        return $this->getAttribute('siteId');
    }

    public function setSiteId(?int $siteId = null): self
    {
        $this->setAttribute('siteId', $siteId);
        return $this;
    }

    public function getGroups(): array|null
    {
        return $this->getAttribute('groups');
    }

    /**
     * @throws ValidationException
     */
    public function setGroups(?array $groups): self
    {
        Validator::optional(Validator::create()
            ->unique())
            ->assert(ValidationHelper::prepareArray($groups));
        $this->setAttribute('groups', $groups);
        return $this;
    }

    public function getUnixUsersHomeDirectory(): UNIXUserHomeDirectoryEnum|null
    {
        return $this->getAttribute('unixUsersHomeDirectory');
    }

    public function setUnixUsersHomeDirectory(?UNIXUserHomeDirectoryEnum $unixUsersHomeDirectory = null): self
    {
        $this->setAttribute('unixUsersHomeDirectory', $unixUsersHomeDirectory);
        return $this;
    }

    public function getPhpVersions(): array|null
    {
        return $this->getAttribute('phpVersions');
    }

    /**
     * @throws ValidationException
     */
    public function setPhpVersions(?array $phpVersions): self
    {
        Validator::optional(Validator::create()
            ->unique())
            ->assert(ValidationHelper::prepareArray($phpVersions));
        $this->setAttribute('phpVersions', $phpVersions);
        return $this;
    }

    public function getLoadBalancingMethod(): LoadBalancingMethodEnum|null
    {
        return $this->getAttribute('loadBalancingMethod');
    }

    public function setLoadBalancingMethod(?LoadBalancingMethodEnum $loadBalancingMethod = null): self
    {
        $this->setAttribute('loadBalancingMethod', $loadBalancingMethod);
        return $this;
    }

    public function getMariadbVersion(): string|null
    {
        return $this->getAttribute('mariadbVersion');
    }

    public function setMariadbVersion(?string $mariadbVersion = null): self
    {
        $this->setAttribute('mariadbVersion', $mariadbVersion);
        return $this;
    }

    public function getNodejsVersion(): int|null
    {
        return $this->getAttribute('nodejsVersion');
    }

    public function setNodejsVersion(?int $nodejsVersion = null): self
    {
        $this->setAttribute('nodejsVersion', $nodejsVersion);
        return $this;
    }

    public function getPostgresqlVersion(): int|null
    {
        return $this->getAttribute('postgresqlVersion');
    }

    public function setPostgresqlVersion(?int $postgresqlVersion = null): self
    {
        $this->setAttribute('postgresqlVersion', $postgresqlVersion);
        return $this;
    }

    public function getMariadbClusterName(): string|null
    {
        return $this->getAttribute('mariadbClusterName');
    }

    public function setMariadbClusterName(?string $mariadbClusterName = null): self
    {
        $this->setAttribute('mariadbClusterName', $mariadbClusterName);
        return $this;
    }

    public function getCustomPhpModulesNames(): array|null
    {
        return $this->getAttribute('customPhpModulesNames');
    }

    /**
     * @throws ValidationException
     */
    public function setCustomPhpModulesNames(?array $customPhpModulesNames): self
    {
        Validator::optional(Validator::create()
            ->unique())
            ->assert(ValidationHelper::prepareArray($customPhpModulesNames));
        $this->setAttribute('customPhpModulesNames', $customPhpModulesNames);
        return $this;
    }

    public function getPhpSettings(): PHPSettings
    {
        return $this->getAttribute('phpSettings');
    }

    public function setPhpSettings(?PHPSettings $phpSettings = null): self
    {
        $this->setAttribute('phpSettings', $phpSettings);
        return $this;
    }

    public function getPhpIoncubeEnabled(): bool
    {
        return $this->getAttribute('phpIoncubeEnabled');
    }

    public function setPhpIoncubeEnabled(?bool $phpIoncubeEnabled = null): self
    {
        $this->setAttribute('phpIoncubeEnabled', $phpIoncubeEnabled);
        return $this;
    }

    public function getKernelcareLicenseKey(): string|null
    {
        return $this->getAttribute('kernelcareLicenseKey');
    }

    public function setKernelcareLicenseKey(?string $kernelcareLicenseKey = null): self
    {
        $this->setAttribute('kernelcareLicenseKey', $kernelcareLicenseKey);
        return $this;
    }

    public function getRedisPassword(): string|null
    {
        return $this->getAttribute('redisPassword');
    }

    public function setRedisPassword(?string $redisPassword = null): self
    {
        $this->setAttribute('redisPassword', $redisPassword);
        return $this;
    }

    public function getRedisMemoryLimit(): int|null
    {
        return $this->getAttribute('redisMemoryLimit');
    }

    public function setRedisMemoryLimit(?int $redisMemoryLimit = null): self
    {
        $this->setAttribute('redisMemoryLimit', $redisMemoryLimit);
        return $this;
    }

    public function getPhpSessionsSpreadEnabled(): bool
    {
        return $this->getAttribute('phpSessionsSpreadEnabled');
    }

    public function setPhpSessionsSpreadEnabled(?bool $phpSessionsSpreadEnabled = null): self
    {
        $this->setAttribute('phpSessionsSpreadEnabled', $phpSessionsSpreadEnabled);
        return $this;
    }

    public function getNodejsVersions(): array|null
    {
        return $this->getAttribute('nodejsVersions');
    }

    /**
     * @throws ValidationException
     */
    public function setNodejsVersions(?array $nodejsVersions): self
    {
        Validator::optional(Validator::create()
            ->unique())
            ->assert(ValidationHelper::prepareArray($nodejsVersions));
        $this->setAttribute('nodejsVersions', $nodejsVersions);
        return $this;
    }

    public function getDescription(): string
    {
        return $this->getAttribute('description');
    }

    /**
     * @throws ValidationException
     */
    public function setDescription(?string $description = null): self
    {
        Validator::create()
            ->length(min: 1, max: 255)
            ->regex('/^[a-zA-Z0-9-_. ]+$/')
            ->assert($description);
        $this->setAttribute('description', $description);
        return $this;
    }

    public function getWordpressToolkitEnabled(): bool
    {
        return $this->getAttribute('wordpressToolkitEnabled');
    }

    public function setWordpressToolkitEnabled(?bool $wordpressToolkitEnabled = null): self
    {
        $this->setAttribute('wordpressToolkitEnabled', $wordpressToolkitEnabled);
        return $this;
    }

    public function getAutomaticBorgRepositoriesPruneEnabled(): bool
    {
        return $this->getAttribute('automaticBorgRepositoriesPruneEnabled');
    }

    public function setAutomaticBorgRepositoriesPruneEnabled(
        ?bool $automaticBorgRepositoriesPruneEnabled = null,
    ): self {
        $this->setAttribute('automaticBorgRepositoriesPruneEnabled', $automaticBorgRepositoriesPruneEnabled);
        return $this;
    }

    public function getSyncToolkitEnabled(): bool
    {
        return $this->getAttribute('syncToolkitEnabled');
    }

    public function setSyncToolkitEnabled(?bool $syncToolkitEnabled = null): self
    {
        $this->setAttribute('syncToolkitEnabled', $syncToolkitEnabled);
        return $this;
    }

    public function getBubblewrapToolkitEnabled(): bool
    {
        return $this->getAttribute('bubblewrapToolkitEnabled');
    }

    public function setBubblewrapToolkitEnabled(?bool $bubblewrapToolkitEnabled = null): self
    {
        $this->setAttribute('bubblewrapToolkitEnabled', $bubblewrapToolkitEnabled);
        return $this;
    }

    public function getAutomaticUpgradesEnabled(): bool
    {
        return $this->getAttribute('automaticUpgradesEnabled');
    }

    public function setAutomaticUpgradesEnabled(?bool $automaticUpgradesEnabled = null): self
    {
        $this->setAttribute('automaticUpgradesEnabled', $automaticUpgradesEnabled);
        return $this;
    }

    public function getFirewallRulesExternalProvidersEnabled(): bool
    {
        return $this->getAttribute('firewallRulesExternalProvidersEnabled');
    }

    public function setFirewallRulesExternalProvidersEnabled(
        ?bool $firewallRulesExternalProvidersEnabled = null,
    ): self {
        $this->setAttribute('firewallRulesExternalProvidersEnabled', $firewallRulesExternalProvidersEnabled);
        return $this;
    }

    public function getDatabaseToolkitEnabled(): bool
    {
        return $this->getAttribute('databaseToolkitEnabled');
    }

    public function setDatabaseToolkitEnabled(?bool $databaseToolkitEnabled = null): self
    {
        $this->setAttribute('databaseToolkitEnabled', $databaseToolkitEnabled);
        return $this;
    }

    public function getMariadbBackupInterval(): int|null
    {
        return $this->getAttribute('mariadbBackupInterval');
    }

    public function setMariadbBackupInterval(?int $mariadbBackupInterval = null): self
    {
        $this->setAttribute('mariadbBackupInterval', $mariadbBackupInterval);
        return $this;
    }

    public function getMariadbBackupLocalRetention(): int|null
    {
        return $this->getAttribute('mariadbBackupLocalRetention');
    }

    public function setMariadbBackupLocalRetention(?int $mariadbBackupLocalRetention = null): self
    {
        $this->setAttribute('mariadbBackupLocalRetention', $mariadbBackupLocalRetention);
        return $this;
    }

    public function getPostgresqlBackupLocalRetention(): int|null
    {
        return $this->getAttribute('postgresqlBackupLocalRetention');
    }

    public function setPostgresqlBackupLocalRetention(?int $postgresqlBackupLocalRetention = null): self
    {
        $this->setAttribute('postgresqlBackupLocalRetention', $postgresqlBackupLocalRetention);
        return $this;
    }

    public function getMeilisearchBackupLocalRetention(): int|null
    {
        return $this->getAttribute('meilisearchBackupLocalRetention');
    }

    public function setMeilisearchBackupLocalRetention(?int $meilisearchBackupLocalRetention = null): self
    {
        $this->setAttribute('meilisearchBackupLocalRetention', $meilisearchBackupLocalRetention);
        return $this;
    }

    public function getNewRelicMariadbPassword(): string|null
    {
        return $this->getAttribute('newRelicMariadbPassword');
    }

    public function setNewRelicMariadbPassword(?string $newRelicMariadbPassword = null): self
    {
        $this->setAttribute('newRelicMariadbPassword', $newRelicMariadbPassword);
        return $this;
    }

    public function getNewRelicApmLicenseKey(): string|null
    {
        return $this->getAttribute('newRelicApmLicenseKey');
    }

    public function setNewRelicApmLicenseKey(?string $newRelicApmLicenseKey = null): self
    {
        $this->setAttribute('newRelicApmLicenseKey', $newRelicApmLicenseKey);
        return $this;
    }

    public function getNewRelicInfrastructureLicenseKey(): string|null
    {
        return $this->getAttribute('newRelicInfrastructureLicenseKey');
    }

    public function setNewRelicInfrastructureLicenseKey(?string $newRelicInfrastructureLicenseKey = null): self
    {
        $this->setAttribute('newRelicInfrastructureLicenseKey', $newRelicInfrastructureLicenseKey);
        return $this;
    }

    public function getMeilisearchMasterKey(): string|null
    {
        return $this->getAttribute('meilisearchMasterKey');
    }

    public function setMeilisearchMasterKey(?string $meilisearchMasterKey = null): self
    {
        $this->setAttribute('meilisearchMasterKey', $meilisearchMasterKey);
        return $this;
    }

    public function getMeilisearchEnvironment(): MeilisearchEnvironmentEnum|null
    {
        return $this->getAttribute('meilisearchEnvironment');
    }

    public function setMeilisearchEnvironment(?MeilisearchEnvironmentEnum $meilisearchEnvironment = null): self
    {
        $this->setAttribute('meilisearchEnvironment', $meilisearchEnvironment);
        return $this;
    }

    public function getMeilisearchBackupInterval(): int|null
    {
        return $this->getAttribute('meilisearchBackupInterval');
    }

    public function setMeilisearchBackupInterval(?int $meilisearchBackupInterval = null): self
    {
        $this->setAttribute('meilisearchBackupInterval', $meilisearchBackupInterval);
        return $this;
    }

    public function getPostgresqlBackupInterval(): int|null
    {
        return $this->getAttribute('postgresqlBackupInterval');
    }

    public function setPostgresqlBackupInterval(?int $postgresqlBackupInterval = null): self
    {
        $this->setAttribute('postgresqlBackupInterval', $postgresqlBackupInterval);
        return $this;
    }

    public function getHttpRetryProperties(): HTTPRetryProperties|null
    {
        return $this->getAttribute('httpRetryProperties');
    }

    public function setHttpRetryProperties(?HTTPRetryProperties $httpRetryProperties = null): self
    {
        $this->setAttribute('httpRetryProperties', $httpRetryProperties);
        return $this;
    }

    public function getGrafanaDomain(): string|null
    {
        return $this->getAttribute('grafanaDomain');
    }

    public function setGrafanaDomain(?string $grafanaDomain = null): self
    {
        $this->setAttribute('grafanaDomain', $grafanaDomain);
        return $this;
    }

    public function getSinglestoreStudioDomain(): string|null
    {
        return $this->getAttribute('singlestoreStudioDomain');
    }

    public function setSinglestoreStudioDomain(?string $singlestoreStudioDomain = null): self
    {
        $this->setAttribute('singlestoreStudioDomain', $singlestoreStudioDomain);
        return $this;
    }

    public function getSinglestoreApiDomain(): string|null
    {
        return $this->getAttribute('singlestoreApiDomain');
    }

    public function setSinglestoreApiDomain(?string $singlestoreApiDomain = null): self
    {
        $this->setAttribute('singlestoreApiDomain', $singlestoreApiDomain);
        return $this;
    }

    public function getSinglestoreLicenseKey(): string|null
    {
        return $this->getAttribute('singlestoreLicenseKey');
    }

    public function setSinglestoreLicenseKey(?string $singlestoreLicenseKey = null): self
    {
        $this->setAttribute('singlestoreLicenseKey', $singlestoreLicenseKey);
        return $this;
    }

    public function getSinglestoreRootPassword(): string|null
    {
        return $this->getAttribute('singlestoreRootPassword');
    }

    public function setSinglestoreRootPassword(?string $singlestoreRootPassword = null): self
    {
        $this->setAttribute('singlestoreRootPassword', $singlestoreRootPassword);
        return $this;
    }

    public function getElasticsearchDefaultUsersPassword(): string|null
    {
        return $this->getAttribute('elasticsearchDefaultUsersPassword');
    }

    public function setElasticsearchDefaultUsersPassword(?string $elasticsearchDefaultUsersPassword = null): self
    {
        $this->setAttribute('elasticsearchDefaultUsersPassword', $elasticsearchDefaultUsersPassword);
        return $this;
    }

    public function getRabbitmqErlangCookie(): string|null
    {
        return $this->getAttribute('rabbitmqErlangCookie');
    }

    public function setRabbitmqErlangCookie(?string $rabbitmqErlangCookie = null): self
    {
        $this->setAttribute('rabbitmqErlangCookie', $rabbitmqErlangCookie);
        return $this;
    }

    public function getRabbitmqAdminPassword(): string|null
    {
        return $this->getAttribute('rabbitmqAdminPassword');
    }

    public function setRabbitmqAdminPassword(?string $rabbitmqAdminPassword = null): self
    {
        $this->setAttribute('rabbitmqAdminPassword', $rabbitmqAdminPassword);
        return $this;
    }

    public function getMetabaseDomain(): string|null
    {
        return $this->getAttribute('metabaseDomain');
    }

    public function setMetabaseDomain(?string $metabaseDomain = null): self
    {
        $this->setAttribute('metabaseDomain', $metabaseDomain);
        return $this;
    }

    public function getMetabaseDatabasePassword(): string|null
    {
        return $this->getAttribute('metabaseDatabasePassword');
    }

    public function setMetabaseDatabasePassword(?string $metabaseDatabasePassword = null): self
    {
        $this->setAttribute('metabaseDatabasePassword', $metabaseDatabasePassword);
        return $this;
    }

    public function getKibanaDomain(): string|null
    {
        return $this->getAttribute('kibanaDomain');
    }

    public function setKibanaDomain(?string $kibanaDomain = null): self
    {
        $this->setAttribute('kibanaDomain', $kibanaDomain);
        return $this;
    }

    public function getRabbitmqManagementDomain(): string|null
    {
        return $this->getAttribute('rabbitmqManagementDomain');
    }

    public function setRabbitmqManagementDomain(?string $rabbitmqManagementDomain = null): self
    {
        $this->setAttribute('rabbitmqManagementDomain', $rabbitmqManagementDomain);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            id: Arr::get($data, 'id'),
            createdAt: Arr::get($data, 'created_at'),
            updatedAt: Arr::get($data, 'updated_at'),
            name: Arr::get($data, 'name'),
            customerId: Arr::get($data, 'customer_id'),
            siteId: Arr::get($data, 'site_id'),
            phpSettings: PHPSettings::fromArray(Arr::get($data, 'php_settings')),
            phpIoncubeEnabled: Arr::get($data, 'php_ioncube_enabled'),
            phpSessionsSpreadEnabled: Arr::get($data, 'php_sessions_spread_enabled'),
            description: Arr::get($data, 'description'),
            wordpressToolkitEnabled: Arr::get($data, 'wordpress_toolkit_enabled'),
            automaticBorgRepositoriesPruneEnabled: Arr::get($data, 'automatic_borg_repositories_prune_enabled'),
            syncToolkitEnabled: Arr::get($data, 'sync_toolkit_enabled'),
            bubblewrapToolkitEnabled: Arr::get($data, 'bubblewrap_toolkit_enabled'),
            automaticUpgradesEnabled: Arr::get($data, 'automatic_upgrades_enabled'),
            firewallRulesExternalProvidersEnabled: Arr::get($data, 'firewall_rules_external_providers_enabled'),
            databaseToolkitEnabled: Arr::get($data, 'database_toolkit_enabled'),
            unixUsersHomeDirectory: Arr::get($data, 'unix_users_home_directory') !== null ? UNIXUserHomeDirectoryEnum::tryFrom(Arr::get($data, 'unix_users_home_directory')) : null,
            loadBalancingMethod: Arr::get($data, 'load_balancing_method') !== null ? LoadBalancingMethodEnum::tryFrom(Arr::get($data, 'load_balancing_method')) : null,
            mariadbVersion: Arr::get($data, 'mariadb_version'),
            nodejsVersion: Arr::get($data, 'nodejs_version'),
            postgresqlVersion: Arr::get($data, 'postgresql_version'),
            mariadbClusterName: Arr::get($data, 'mariadb_cluster_name'),
            kernelcareLicenseKey: Arr::get($data, 'kernelcare_license_key'),
            redisPassword: Arr::get($data, 'redis_password'),
            redisMemoryLimit: Arr::get($data, 'redis_memory_limit'),
            mariadbBackupInterval: Arr::get($data, 'mariadb_backup_interval'),
            mariadbBackupLocalRetention: Arr::get($data, 'mariadb_backup_local_retention'),
            postgresqlBackupLocalRetention: Arr::get($data, 'postgresql_backup_local_retention'),
            meilisearchBackupLocalRetention: Arr::get($data, 'meilisearch_backup_local_retention'),
            newRelicMariadbPassword: Arr::get($data, 'new_relic_mariadb_password'),
            newRelicApmLicenseKey: Arr::get($data, 'new_relic_apm_license_key'),
            newRelicInfrastructureLicenseKey: Arr::get($data, 'new_relic_infrastructure_license_key'),
            meilisearchMasterKey: Arr::get($data, 'meilisearch_master_key'),
            meilisearchEnvironment: Arr::get($data, 'meilisearch_environment') !== null ? MeilisearchEnvironmentEnum::tryFrom(Arr::get($data, 'meilisearch_environment')) : null,
            meilisearchBackupInterval: Arr::get($data, 'meilisearch_backup_interval'),
            postgresqlBackupInterval: Arr::get($data, 'postgresql_backup_interval'),
            httpRetryProperties: Arr::get($data, 'http_retry_properties') !== null ? HTTPRetryProperties::fromArray(Arr::get($data, 'http_retry_properties')) : null,
            grafanaDomain: Arr::get($data, 'grafana_domain'),
            singlestoreStudioDomain: Arr::get($data, 'singlestore_studio_domain'),
            singlestoreApiDomain: Arr::get($data, 'singlestore_api_domain'),
            singlestoreLicenseKey: Arr::get($data, 'singlestore_license_key'),
            singlestoreRootPassword: Arr::get($data, 'singlestore_root_password'),
            elasticsearchDefaultUsersPassword: Arr::get($data, 'elasticsearch_default_users_password'),
            rabbitmqErlangCookie: Arr::get($data, 'rabbitmq_erlang_cookie'),
            rabbitmqAdminPassword: Arr::get($data, 'rabbitmq_admin_password'),
            metabaseDomain: Arr::get($data, 'metabase_domain'),
            metabaseDatabasePassword: Arr::get($data, 'metabase_database_password'),
            kibanaDomain: Arr::get($data, 'kibana_domain'),
            rabbitmqManagementDomain: Arr::get($data, 'rabbitmq_management_domain'),
        ))
            ->setGroups(Arr::get($data, 'groups'))
            ->setPhpVersions(Arr::get($data, 'php_versions'))
            ->setCustomPhpModulesNames(Arr::get($data, 'custom_php_modules_names'))
            ->setNodejsVersions(Arr::get($data, 'nodejs_versions'));
    }
}
