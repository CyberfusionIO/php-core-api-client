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

class ClusterUpdateRequest extends CoreApiModel implements CoreApiModelContract
{
    public function __construct()
    {
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

    public function setUnixUsersHomeDirectory(?UNIXUserHomeDirectoryEnum $unixUsersHomeDirectory): self
    {
        $this->setAttribute('unix_users_home_directory', $unixUsersHomeDirectory);
        return $this;
    }

    public function getLoadBalancingMethod(): LoadBalancingMethodEnum|null
    {
        return $this->getAttribute('loadBalancingMethod');
    }

    public function setLoadBalancingMethod(?LoadBalancingMethodEnum $loadBalancingMethod): self
    {
        $this->setAttribute('load_balancing_method', $loadBalancingMethod);
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
        $this->setAttribute('php_versions', $phpVersions);
        return $this;
    }

    public function getMariadbVersion(): string|null
    {
        return $this->getAttribute('mariadbVersion');
    }

    public function setMariadbVersion(?string $mariadbVersion): self
    {
        $this->setAttribute('mariadb_version', $mariadbVersion);
        return $this;
    }

    public function getNodejsVersion(): int|null
    {
        return $this->getAttribute('nodejsVersion');
    }

    public function setNodejsVersion(?int $nodejsVersion): self
    {
        $this->setAttribute('nodejs_version', $nodejsVersion);
        return $this;
    }

    public function getPostgresqlVersion(): int|null
    {
        return $this->getAttribute('postgresqlVersion');
    }

    public function setPostgresqlVersion(?int $postgresqlVersion): self
    {
        $this->setAttribute('postgresql_version', $postgresqlVersion);
        return $this;
    }

    public function getMariadbClusterName(): string|null
    {
        return $this->getAttribute('mariadbClusterName');
    }

    public function setMariadbClusterName(?string $mariadbClusterName): self
    {
        $this->setAttribute('mariadb_cluster_name', $mariadbClusterName);
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
        $this->setAttribute('custom_php_modules_names', $customPhpModulesNames);
        return $this;
    }

    public function getPhpSettings(): PHPSettings
    {
        return $this->getAttribute('phpSettings');
    }

    public function setPhpSettings(PHPSettings $phpSettings): self
    {
        $this->setAttribute('php_settings', $phpSettings);
        return $this;
    }

    public function getPhpIoncubeEnabled(): bool
    {
        return $this->getAttribute('phpIoncubeEnabled');
    }

    public function setPhpIoncubeEnabled(bool $phpIoncubeEnabled): self
    {
        $this->setAttribute('php_ioncube_enabled', $phpIoncubeEnabled);
        return $this;
    }

    public function getKernelcareLicenseKey(): string|null
    {
        return $this->getAttribute('kernelcareLicenseKey');
    }

    public function setKernelcareLicenseKey(?string $kernelcareLicenseKey): self
    {
        $this->setAttribute('kernelcare_license_key', $kernelcareLicenseKey);
        return $this;
    }

    public function getRedisPassword(): string|null
    {
        return $this->getAttribute('redisPassword');
    }

    public function setRedisPassword(?string $redisPassword): self
    {
        $this->setAttribute('redis_password', $redisPassword);
        return $this;
    }

    public function getRedisMemoryLimit(): int|null
    {
        return $this->getAttribute('redisMemoryLimit');
    }

    public function setRedisMemoryLimit(?int $redisMemoryLimit): self
    {
        $this->setAttribute('redis_memory_limit', $redisMemoryLimit);
        return $this;
    }

    public function getPhpSessionsSpreadEnabled(): bool
    {
        return $this->getAttribute('phpSessionsSpreadEnabled');
    }

    public function setPhpSessionsSpreadEnabled(bool $phpSessionsSpreadEnabled): self
    {
        $this->setAttribute('php_sessions_spread_enabled', $phpSessionsSpreadEnabled);
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
        $this->setAttribute('nodejs_versions', $nodejsVersions);
        return $this;
    }

    public function getDescription(): string
    {
        return $this->getAttribute('description');
    }

    /**
     * @throws ValidationException
     */
    public function setDescription(string $description): self
    {
        Validator::optional(Validator::create()
            ->length(min: 1, max: 255)
            ->regex('/^[a-zA-Z0-9-_. ]+$/'))
            ->assert($description);
        $this->setAttribute('description', $description);
        return $this;
    }

    public function getWordpressToolkitEnabled(): bool
    {
        return $this->getAttribute('wordpressToolkitEnabled');
    }

    public function setWordpressToolkitEnabled(bool $wordpressToolkitEnabled): self
    {
        $this->setAttribute('wordpress_toolkit_enabled', $wordpressToolkitEnabled);
        return $this;
    }

    public function getAutomaticBorgRepositoriesPruneEnabled(): bool
    {
        return $this->getAttribute('automaticBorgRepositoriesPruneEnabled');
    }

    public function setAutomaticBorgRepositoriesPruneEnabled(bool $automaticBorgRepositoriesPruneEnabled): self
    {
        $this->setAttribute('automatic_borg_repositories_prune_enabled', $automaticBorgRepositoriesPruneEnabled);
        return $this;
    }

    public function getSyncToolkitEnabled(): bool
    {
        return $this->getAttribute('syncToolkitEnabled');
    }

    public function setSyncToolkitEnabled(bool $syncToolkitEnabled): self
    {
        $this->setAttribute('sync_toolkit_enabled', $syncToolkitEnabled);
        return $this;
    }

    public function getBubblewrapToolkitEnabled(): bool
    {
        return $this->getAttribute('bubblewrapToolkitEnabled');
    }

    public function setBubblewrapToolkitEnabled(bool $bubblewrapToolkitEnabled): self
    {
        $this->setAttribute('bubblewrap_toolkit_enabled', $bubblewrapToolkitEnabled);
        return $this;
    }

    public function getAutomaticUpgradesEnabled(): bool
    {
        return $this->getAttribute('automaticUpgradesEnabled');
    }

    public function setAutomaticUpgradesEnabled(bool $automaticUpgradesEnabled): self
    {
        $this->setAttribute('automatic_upgrades_enabled', $automaticUpgradesEnabled);
        return $this;
    }

    public function getFirewallRulesExternalProvidersEnabled(): bool
    {
        return $this->getAttribute('firewallRulesExternalProvidersEnabled');
    }

    public function setFirewallRulesExternalProvidersEnabled(bool $firewallRulesExternalProvidersEnabled): self
    {
        $this->setAttribute('firewall_rules_external_providers_enabled', $firewallRulesExternalProvidersEnabled);
        return $this;
    }

    public function getDatabaseToolkitEnabled(): bool
    {
        return $this->getAttribute('databaseToolkitEnabled');
    }

    public function setDatabaseToolkitEnabled(bool $databaseToolkitEnabled): self
    {
        $this->setAttribute('database_toolkit_enabled', $databaseToolkitEnabled);
        return $this;
    }

    public function getMariadbBackupInterval(): int|null
    {
        return $this->getAttribute('mariadbBackupInterval');
    }

    public function setMariadbBackupInterval(?int $mariadbBackupInterval): self
    {
        $this->setAttribute('mariadb_backup_interval', $mariadbBackupInterval);
        return $this;
    }

    public function getMariadbBackupLocalRetention(): int|null
    {
        return $this->getAttribute('mariadbBackupLocalRetention');
    }

    public function setMariadbBackupLocalRetention(?int $mariadbBackupLocalRetention): self
    {
        $this->setAttribute('mariadb_backup_local_retention', $mariadbBackupLocalRetention);
        return $this;
    }

    public function getPostgresqlBackupLocalRetention(): int|null
    {
        return $this->getAttribute('postgresqlBackupLocalRetention');
    }

    public function setPostgresqlBackupLocalRetention(?int $postgresqlBackupLocalRetention): self
    {
        $this->setAttribute('postgresql_backup_local_retention', $postgresqlBackupLocalRetention);
        return $this;
    }

    public function getMeilisearchBackupLocalRetention(): int|null
    {
        return $this->getAttribute('meilisearchBackupLocalRetention');
    }

    public function setMeilisearchBackupLocalRetention(?int $meilisearchBackupLocalRetention): self
    {
        $this->setAttribute('meilisearch_backup_local_retention', $meilisearchBackupLocalRetention);
        return $this;
    }

    public function getNewRelicMariadbPassword(): string|null
    {
        return $this->getAttribute('newRelicMariadbPassword');
    }

    public function setNewRelicMariadbPassword(?string $newRelicMariadbPassword): self
    {
        $this->setAttribute('new_relic_mariadb_password', $newRelicMariadbPassword);
        return $this;
    }

    public function getNewRelicApmLicenseKey(): string|null
    {
        return $this->getAttribute('newRelicApmLicenseKey');
    }

    public function setNewRelicApmLicenseKey(?string $newRelicApmLicenseKey): self
    {
        $this->setAttribute('new_relic_apm_license_key', $newRelicApmLicenseKey);
        return $this;
    }

    public function getNewRelicInfrastructureLicenseKey(): string|null
    {
        return $this->getAttribute('newRelicInfrastructureLicenseKey');
    }

    public function setNewRelicInfrastructureLicenseKey(?string $newRelicInfrastructureLicenseKey): self
    {
        $this->setAttribute('new_relic_infrastructure_license_key', $newRelicInfrastructureLicenseKey);
        return $this;
    }

    public function getMeilisearchMasterKey(): string|null
    {
        return $this->getAttribute('meilisearchMasterKey');
    }

    public function setMeilisearchMasterKey(?string $meilisearchMasterKey): self
    {
        $this->setAttribute('meilisearch_master_key', $meilisearchMasterKey);
        return $this;
    }

    public function getMeilisearchEnvironment(): MeilisearchEnvironmentEnum|null
    {
        return $this->getAttribute('meilisearchEnvironment');
    }

    public function setMeilisearchEnvironment(?MeilisearchEnvironmentEnum $meilisearchEnvironment): self
    {
        $this->setAttribute('meilisearch_environment', $meilisearchEnvironment);
        return $this;
    }

    public function getMeilisearchBackupInterval(): int|null
    {
        return $this->getAttribute('meilisearchBackupInterval');
    }

    public function setMeilisearchBackupInterval(?int $meilisearchBackupInterval): self
    {
        $this->setAttribute('meilisearch_backup_interval', $meilisearchBackupInterval);
        return $this;
    }

    public function getPostgresqlBackupInterval(): int|null
    {
        return $this->getAttribute('postgresqlBackupInterval');
    }

    public function setPostgresqlBackupInterval(?int $postgresqlBackupInterval): self
    {
        $this->setAttribute('postgresql_backup_interval', $postgresqlBackupInterval);
        return $this;
    }

    public function getHttpRetryProperties(): HTTPRetryProperties|null
    {
        return $this->getAttribute('httpRetryProperties');
    }

    public function setHttpRetryProperties(?HTTPRetryProperties $httpRetryProperties): self
    {
        $this->setAttribute('http_retry_properties', $httpRetryProperties);
        return $this;
    }

    public function getGrafanaDomain(): string|null
    {
        return $this->getAttribute('grafanaDomain');
    }

    public function setGrafanaDomain(?string $grafanaDomain): self
    {
        $this->setAttribute('grafana_domain', $grafanaDomain);
        return $this;
    }

    public function getSinglestoreStudioDomain(): string|null
    {
        return $this->getAttribute('singlestoreStudioDomain');
    }

    public function setSinglestoreStudioDomain(?string $singlestoreStudioDomain): self
    {
        $this->setAttribute('singlestore_studio_domain', $singlestoreStudioDomain);
        return $this;
    }

    public function getSinglestoreApiDomain(): string|null
    {
        return $this->getAttribute('singlestoreApiDomain');
    }

    public function setSinglestoreApiDomain(?string $singlestoreApiDomain): self
    {
        $this->setAttribute('singlestore_api_domain', $singlestoreApiDomain);
        return $this;
    }

    public function getSinglestoreLicenseKey(): string|null
    {
        return $this->getAttribute('singlestoreLicenseKey');
    }

    public function setSinglestoreLicenseKey(?string $singlestoreLicenseKey): self
    {
        $this->setAttribute('singlestore_license_key', $singlestoreLicenseKey);
        return $this;
    }

    public function getSinglestoreRootPassword(): string|null
    {
        return $this->getAttribute('singlestoreRootPassword');
    }

    public function setSinglestoreRootPassword(?string $singlestoreRootPassword): self
    {
        $this->setAttribute('singlestore_root_password', $singlestoreRootPassword);
        return $this;
    }

    public function getElasticsearchDefaultUsersPassword(): string|null
    {
        return $this->getAttribute('elasticsearchDefaultUsersPassword');
    }

    public function setElasticsearchDefaultUsersPassword(?string $elasticsearchDefaultUsersPassword): self
    {
        $this->setAttribute('elasticsearch_default_users_password', $elasticsearchDefaultUsersPassword);
        return $this;
    }

    public function getRabbitmqErlangCookie(): string|null
    {
        return $this->getAttribute('rabbitmqErlangCookie');
    }

    public function setRabbitmqErlangCookie(?string $rabbitmqErlangCookie): self
    {
        $this->setAttribute('rabbitmq_erlang_cookie', $rabbitmqErlangCookie);
        return $this;
    }

    public function getRabbitmqAdminPassword(): string|null
    {
        return $this->getAttribute('rabbitmqAdminPassword');
    }

    public function setRabbitmqAdminPassword(?string $rabbitmqAdminPassword): self
    {
        $this->setAttribute('rabbitmq_admin_password', $rabbitmqAdminPassword);
        return $this;
    }

    public function getMetabaseDomain(): string|null
    {
        return $this->getAttribute('metabaseDomain');
    }

    public function setMetabaseDomain(?string $metabaseDomain): self
    {
        $this->setAttribute('metabase_domain', $metabaseDomain);
        return $this;
    }

    public function getMetabaseDatabasePassword(): string|null
    {
        return $this->getAttribute('metabaseDatabasePassword');
    }

    public function setMetabaseDatabasePassword(?string $metabaseDatabasePassword): self
    {
        $this->setAttribute('metabase_database_password', $metabaseDatabasePassword);
        return $this;
    }

    public function getKibanaDomain(): string|null
    {
        return $this->getAttribute('kibanaDomain');
    }

    public function setKibanaDomain(?string $kibanaDomain): self
    {
        $this->setAttribute('kibana_domain', $kibanaDomain);
        return $this;
    }

    public function getRabbitmqManagementDomain(): string|null
    {
        return $this->getAttribute('rabbitmqManagementDomain');
    }

    public function setRabbitmqManagementDomain(?string $rabbitmqManagementDomain): self
    {
        $this->setAttribute('rabbitmq_management_domain', $rabbitmqManagementDomain);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
        ))
            ->setGroups(Arr::get($data, 'groups'))
            ->setUnixUsersHomeDirectory(Arr::get($data, 'unix_users_home_directory'))
            ->setLoadBalancingMethod(Arr::get($data, 'load_balancing_method'))
            ->setPhpVersions(Arr::get($data, 'php_versions'))
            ->setMariadbVersion(Arr::get($data, 'mariadb_version'))
            ->setNodejsVersion(Arr::get($data, 'nodejs_version'))
            ->setPostgresqlVersion(Arr::get($data, 'postgresql_version'))
            ->setMariadbClusterName(Arr::get($data, 'mariadb_cluster_name'))
            ->setCustomPhpModulesNames(Arr::get($data, 'custom_php_modules_names'))
            ->setPhpSettings(Arr::get($data, 'php_settings'))
            ->setPhpIoncubeEnabled(Arr::get($data, 'php_ioncube_enabled'))
            ->setKernelcareLicenseKey(Arr::get($data, 'kernelcare_license_key'))
            ->setRedisPassword(Arr::get($data, 'redis_password'))
            ->setRedisMemoryLimit(Arr::get($data, 'redis_memory_limit'))
            ->setPhpSessionsSpreadEnabled(Arr::get($data, 'php_sessions_spread_enabled'))
            ->setNodejsVersions(Arr::get($data, 'nodejs_versions'))
            ->setDescription(Arr::get($data, 'description'))
            ->setWordpressToolkitEnabled(Arr::get($data, 'wordpress_toolkit_enabled'))
            ->setAutomaticBorgRepositoriesPruneEnabled(Arr::get($data, 'automatic_borg_repositories_prune_enabled'))
            ->setSyncToolkitEnabled(Arr::get($data, 'sync_toolkit_enabled'))
            ->setBubblewrapToolkitEnabled(Arr::get($data, 'bubblewrap_toolkit_enabled'))
            ->setAutomaticUpgradesEnabled(Arr::get($data, 'automatic_upgrades_enabled'))
            ->setFirewallRulesExternalProvidersEnabled(Arr::get($data, 'firewall_rules_external_providers_enabled'))
            ->setDatabaseToolkitEnabled(Arr::get($data, 'database_toolkit_enabled'))
            ->setMariadbBackupInterval(Arr::get($data, 'mariadb_backup_interval'))
            ->setMariadbBackupLocalRetention(Arr::get($data, 'mariadb_backup_local_retention'))
            ->setPostgresqlBackupLocalRetention(Arr::get($data, 'postgresql_backup_local_retention'))
            ->setMeilisearchBackupLocalRetention(Arr::get($data, 'meilisearch_backup_local_retention'))
            ->setNewRelicMariadbPassword(Arr::get($data, 'new_relic_mariadb_password'))
            ->setNewRelicApmLicenseKey(Arr::get($data, 'new_relic_apm_license_key'))
            ->setNewRelicInfrastructureLicenseKey(Arr::get($data, 'new_relic_infrastructure_license_key'))
            ->setMeilisearchMasterKey(Arr::get($data, 'meilisearch_master_key'))
            ->setMeilisearchEnvironment(Arr::get($data, 'meilisearch_environment'))
            ->setMeilisearchBackupInterval(Arr::get($data, 'meilisearch_backup_interval'))
            ->setPostgresqlBackupInterval(Arr::get($data, 'postgresql_backup_interval'))
            ->setHttpRetryProperties(Arr::get($data, 'http_retry_properties'))
            ->setGrafanaDomain(Arr::get($data, 'grafana_domain'))
            ->setSinglestoreStudioDomain(Arr::get($data, 'singlestore_studio_domain'))
            ->setSinglestoreApiDomain(Arr::get($data, 'singlestore_api_domain'))
            ->setSinglestoreLicenseKey(Arr::get($data, 'singlestore_license_key'))
            ->setSinglestoreRootPassword(Arr::get($data, 'singlestore_root_password'))
            ->setElasticsearchDefaultUsersPassword(Arr::get($data, 'elasticsearch_default_users_password'))
            ->setRabbitmqErlangCookie(Arr::get($data, 'rabbitmq_erlang_cookie'))
            ->setRabbitmqAdminPassword(Arr::get($data, 'rabbitmq_admin_password'))
            ->setMetabaseDomain(Arr::get($data, 'metabase_domain'))
            ->setMetabaseDatabasePassword(Arr::get($data, 'metabase_database_password'))
            ->setKibanaDomain(Arr::get($data, 'kibana_domain'))
            ->setRabbitmqManagementDomain(Arr::get($data, 'rabbitmq_management_domain'));
    }
}
