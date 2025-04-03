<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

/**
 * All children of cluster.
 */
class ClusterChildren extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(
        array $firewallGroups,
        array $securityTxtPolicies,
        array $unixUsers,
        array $borgRepositories,
        array $ftpUsers,
        array $borgArchives,
        array $customConfigSnippets,
        array $customConfigs,
        array $unixUsersRabbitmqCredentials,
        array $tombstones,
        array $basicAuthenticationRealms,
        array $htpasswdUsers,
        array $crons,
        array $daemons,
        array $mariadbEncryptionKeys,
        array $firewallRules,
        array $hostsEntries,
        array $htpasswdFiles,
        array $virtualHosts,
        array $domainRouters,
        array $mailHostnames,
        array $urlRedirects,
        array $fpmPools,
        array $redisInstances,
        array $passengerApps,
        array $nodes,
        array $haproxyListens,
        array $haproxyListensToNodes,
        array $sshKeys,
        array $rootSshKeys,
        array $certificates,
        array $certificateManagers,
        array $databases,
        array $databaseUsers,
        array $databaseUserGrants,
        array $malwares,
        array $cmses,
        array $mailDomains,
        array $mailAccounts,
        array $mailAliases,
        array $nodeAddOns,
    ) {
        $this->setFirewallGroups($firewallGroups);
        $this->setSecurityTxtPolicies($securityTxtPolicies);
        $this->setUnixUsers($unixUsers);
        $this->setBorgRepositories($borgRepositories);
        $this->setFtpUsers($ftpUsers);
        $this->setBorgArchives($borgArchives);
        $this->setCustomConfigSnippets($customConfigSnippets);
        $this->setCustomConfigs($customConfigs);
        $this->setUnixUsersRabbitmqCredentials($unixUsersRabbitmqCredentials);
        $this->setTombstones($tombstones);
        $this->setBasicAuthenticationRealms($basicAuthenticationRealms);
        $this->setHtpasswdUsers($htpasswdUsers);
        $this->setCrons($crons);
        $this->setDaemons($daemons);
        $this->setMariadbEncryptionKeys($mariadbEncryptionKeys);
        $this->setFirewallRules($firewallRules);
        $this->setHostsEntries($hostsEntries);
        $this->setHtpasswdFiles($htpasswdFiles);
        $this->setVirtualHosts($virtualHosts);
        $this->setDomainRouters($domainRouters);
        $this->setMailHostnames($mailHostnames);
        $this->setUrlRedirects($urlRedirects);
        $this->setFpmPools($fpmPools);
        $this->setRedisInstances($redisInstances);
        $this->setPassengerApps($passengerApps);
        $this->setNodes($nodes);
        $this->setHaproxyListens($haproxyListens);
        $this->setHaproxyListensToNodes($haproxyListensToNodes);
        $this->setSshKeys($sshKeys);
        $this->setRootSshKeys($rootSshKeys);
        $this->setCertificates($certificates);
        $this->setCertificateManagers($certificateManagers);
        $this->setDatabases($databases);
        $this->setDatabaseUsers($databaseUsers);
        $this->setDatabaseUserGrants($databaseUserGrants);
        $this->setMalwares($malwares);
        $this->setCmses($cmses);
        $this->setMailDomains($mailDomains);
        $this->setMailAccounts($mailAccounts);
        $this->setMailAliases($mailAliases);
        $this->setNodeAddOns($nodeAddOns);
    }

    public function getFirewallGroups(): array
    {
        return $this->getAttribute('firewall_groups');
    }

    public function setFirewallGroups(array $firewallGroups = []): self
    {
        $this->setAttribute('firewall_groups', $firewallGroups);
        return $this;
    }

    public function getSecurityTxtPolicies(): array
    {
        return $this->getAttribute('security_txt_policies');
    }

    public function setSecurityTxtPolicies(array $securityTxtPolicies = []): self
    {
        $this->setAttribute('security_txt_policies', $securityTxtPolicies);
        return $this;
    }

    public function getUnixUsers(): array
    {
        return $this->getAttribute('unix_users');
    }

    public function setUnixUsers(array $unixUsers = []): self
    {
        $this->setAttribute('unix_users', $unixUsers);
        return $this;
    }

    public function getBorgRepositories(): array
    {
        return $this->getAttribute('borg_repositories');
    }

    public function setBorgRepositories(array $borgRepositories = []): self
    {
        $this->setAttribute('borg_repositories', $borgRepositories);
        return $this;
    }

    public function getFtpUsers(): array
    {
        return $this->getAttribute('ftp_users');
    }

    public function setFtpUsers(array $ftpUsers = []): self
    {
        $this->setAttribute('ftp_users', $ftpUsers);
        return $this;
    }

    public function getBorgArchives(): array
    {
        return $this->getAttribute('borg_archives');
    }

    public function setBorgArchives(array $borgArchives = []): self
    {
        $this->setAttribute('borg_archives', $borgArchives);
        return $this;
    }

    public function getCustomConfigSnippets(): array
    {
        return $this->getAttribute('custom_config_snippets');
    }

    public function setCustomConfigSnippets(array $customConfigSnippets = []): self
    {
        $this->setAttribute('custom_config_snippets', $customConfigSnippets);
        return $this;
    }

    public function getCustomConfigs(): array
    {
        return $this->getAttribute('custom_configs');
    }

    public function setCustomConfigs(array $customConfigs = []): self
    {
        $this->setAttribute('custom_configs', $customConfigs);
        return $this;
    }

    public function getUnixUsersRabbitmqCredentials(): array
    {
        return $this->getAttribute('unix_users_rabbitmq_credentials');
    }

    public function setUnixUsersRabbitmqCredentials(array $unixUsersRabbitmqCredentials = []): self
    {
        $this->setAttribute('unix_users_rabbitmq_credentials', $unixUsersRabbitmqCredentials);
        return $this;
    }

    public function getTombstones(): array
    {
        return $this->getAttribute('tombstones');
    }

    public function setTombstones(array $tombstones = []): self
    {
        $this->setAttribute('tombstones', $tombstones);
        return $this;
    }

    public function getBasicAuthenticationRealms(): array
    {
        return $this->getAttribute('basic_authentication_realms');
    }

    public function setBasicAuthenticationRealms(array $basicAuthenticationRealms = []): self
    {
        $this->setAttribute('basic_authentication_realms', $basicAuthenticationRealms);
        return $this;
    }

    public function getHtpasswdUsers(): array
    {
        return $this->getAttribute('htpasswd_users');
    }

    public function setHtpasswdUsers(array $htpasswdUsers = []): self
    {
        $this->setAttribute('htpasswd_users', $htpasswdUsers);
        return $this;
    }

    public function getCrons(): array
    {
        return $this->getAttribute('crons');
    }

    public function setCrons(array $crons = []): self
    {
        $this->setAttribute('crons', $crons);
        return $this;
    }

    public function getDaemons(): array
    {
        return $this->getAttribute('daemons');
    }

    public function setDaemons(array $daemons = []): self
    {
        $this->setAttribute('daemons', $daemons);
        return $this;
    }

    public function getMariadbEncryptionKeys(): array
    {
        return $this->getAttribute('mariadb_encryption_keys');
    }

    public function setMariadbEncryptionKeys(array $mariadbEncryptionKeys = []): self
    {
        $this->setAttribute('mariadb_encryption_keys', $mariadbEncryptionKeys);
        return $this;
    }

    public function getFirewallRules(): array
    {
        return $this->getAttribute('firewall_rules');
    }

    public function setFirewallRules(array $firewallRules = []): self
    {
        $this->setAttribute('firewall_rules', $firewallRules);
        return $this;
    }

    public function getHostsEntries(): array
    {
        return $this->getAttribute('hosts_entries');
    }

    public function setHostsEntries(array $hostsEntries = []): self
    {
        $this->setAttribute('hosts_entries', $hostsEntries);
        return $this;
    }

    public function getHtpasswdFiles(): array
    {
        return $this->getAttribute('htpasswd_files');
    }

    public function setHtpasswdFiles(array $htpasswdFiles = []): self
    {
        $this->setAttribute('htpasswd_files', $htpasswdFiles);
        return $this;
    }

    public function getVirtualHosts(): array
    {
        return $this->getAttribute('virtual_hosts');
    }

    public function setVirtualHosts(array $virtualHosts = []): self
    {
        $this->setAttribute('virtual_hosts', $virtualHosts);
        return $this;
    }

    public function getDomainRouters(): array
    {
        return $this->getAttribute('domain_routers');
    }

    public function setDomainRouters(array $domainRouters = []): self
    {
        $this->setAttribute('domain_routers', $domainRouters);
        return $this;
    }

    public function getMailHostnames(): array
    {
        return $this->getAttribute('mail_hostnames');
    }

    public function setMailHostnames(array $mailHostnames = []): self
    {
        $this->setAttribute('mail_hostnames', $mailHostnames);
        return $this;
    }

    public function getUrlRedirects(): array
    {
        return $this->getAttribute('url_redirects');
    }

    public function setUrlRedirects(array $urlRedirects = []): self
    {
        $this->setAttribute('url_redirects', $urlRedirects);
        return $this;
    }

    public function getFpmPools(): array
    {
        return $this->getAttribute('fpm_pools');
    }

    public function setFpmPools(array $fpmPools = []): self
    {
        $this->setAttribute('fpm_pools', $fpmPools);
        return $this;
    }

    public function getRedisInstances(): array
    {
        return $this->getAttribute('redis_instances');
    }

    public function setRedisInstances(array $redisInstances = []): self
    {
        $this->setAttribute('redis_instances', $redisInstances);
        return $this;
    }

    public function getPassengerApps(): array
    {
        return $this->getAttribute('passenger_apps');
    }

    public function setPassengerApps(array $passengerApps = []): self
    {
        $this->setAttribute('passenger_apps', $passengerApps);
        return $this;
    }

    public function getNodes(): array
    {
        return $this->getAttribute('nodes');
    }

    public function setNodes(array $nodes = []): self
    {
        $this->setAttribute('nodes', $nodes);
        return $this;
    }

    public function getHaproxyListens(): array
    {
        return $this->getAttribute('haproxy_listens');
    }

    public function setHaproxyListens(array $haproxyListens = []): self
    {
        $this->setAttribute('haproxy_listens', $haproxyListens);
        return $this;
    }

    public function getHaproxyListensToNodes(): array
    {
        return $this->getAttribute('haproxy_listens_to_nodes');
    }

    public function setHaproxyListensToNodes(array $haproxyListensToNodes = []): self
    {
        $this->setAttribute('haproxy_listens_to_nodes', $haproxyListensToNodes);
        return $this;
    }

    public function getSshKeys(): array
    {
        return $this->getAttribute('ssh_keys');
    }

    public function setSshKeys(array $sshKeys = []): self
    {
        $this->setAttribute('ssh_keys', $sshKeys);
        return $this;
    }

    public function getRootSshKeys(): array
    {
        return $this->getAttribute('root_ssh_keys');
    }

    public function setRootSshKeys(array $rootSshKeys = []): self
    {
        $this->setAttribute('root_ssh_keys', $rootSshKeys);
        return $this;
    }

    public function getCertificates(): array
    {
        return $this->getAttribute('certificates');
    }

    public function setCertificates(array $certificates = []): self
    {
        $this->setAttribute('certificates', $certificates);
        return $this;
    }

    public function getCertificateManagers(): array
    {
        return $this->getAttribute('certificate_managers');
    }

    public function setCertificateManagers(array $certificateManagers = []): self
    {
        $this->setAttribute('certificate_managers', $certificateManagers);
        return $this;
    }

    public function getDatabases(): array
    {
        return $this->getAttribute('databases');
    }

    public function setDatabases(array $databases = []): self
    {
        $this->setAttribute('databases', $databases);
        return $this;
    }

    public function getDatabaseUsers(): array
    {
        return $this->getAttribute('database_users');
    }

    public function setDatabaseUsers(array $databaseUsers = []): self
    {
        $this->setAttribute('database_users', $databaseUsers);
        return $this;
    }

    public function getDatabaseUserGrants(): array
    {
        return $this->getAttribute('database_user_grants');
    }

    public function setDatabaseUserGrants(array $databaseUserGrants = []): self
    {
        $this->setAttribute('database_user_grants', $databaseUserGrants);
        return $this;
    }

    public function getMalwares(): array
    {
        return $this->getAttribute('malwares');
    }

    public function setMalwares(array $malwares = []): self
    {
        $this->setAttribute('malwares', $malwares);
        return $this;
    }

    public function getCmses(): array
    {
        return $this->getAttribute('cmses');
    }

    public function setCmses(array $cmses = []): self
    {
        $this->setAttribute('cmses', $cmses);
        return $this;
    }

    public function getMailDomains(): array
    {
        return $this->getAttribute('mail_domains');
    }

    public function setMailDomains(array $mailDomains = []): self
    {
        $this->setAttribute('mail_domains', $mailDomains);
        return $this;
    }

    public function getMailAccounts(): array
    {
        return $this->getAttribute('mail_accounts');
    }

    public function setMailAccounts(array $mailAccounts = []): self
    {
        $this->setAttribute('mail_accounts', $mailAccounts);
        return $this;
    }

    public function getMailAliases(): array
    {
        return $this->getAttribute('mail_aliases');
    }

    public function setMailAliases(array $mailAliases = []): self
    {
        $this->setAttribute('mail_aliases', $mailAliases);
        return $this;
    }

    public function getNodeAddOns(): array
    {
        return $this->getAttribute('node_add_ons');
    }

    public function setNodeAddOns(array $nodeAddOns = []): self
    {
        $this->setAttribute('node_add_ons', $nodeAddOns);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            firewallGroups: Arr::get($data, 'firewall_groups'),
            securityTxtPolicies: Arr::get($data, 'security_txt_policies'),
            unixUsers: Arr::get($data, 'unix_users'),
            borgRepositories: Arr::get($data, 'borg_repositories'),
            ftpUsers: Arr::get($data, 'ftp_users'),
            borgArchives: Arr::get($data, 'borg_archives'),
            customConfigSnippets: Arr::get($data, 'custom_config_snippets'),
            customConfigs: Arr::get($data, 'custom_configs'),
            unixUsersRabbitmqCredentials: Arr::get($data, 'unix_users_rabbitmq_credentials'),
            tombstones: Arr::get($data, 'tombstones'),
            basicAuthenticationRealms: Arr::get($data, 'basic_authentication_realms'),
            htpasswdUsers: Arr::get($data, 'htpasswd_users'),
            crons: Arr::get($data, 'crons'),
            daemons: Arr::get($data, 'daemons'),
            mariadbEncryptionKeys: Arr::get($data, 'mariadb_encryption_keys'),
            firewallRules: Arr::get($data, 'firewall_rules'),
            hostsEntries: Arr::get($data, 'hosts_entries'),
            htpasswdFiles: Arr::get($data, 'htpasswd_files'),
            virtualHosts: Arr::get($data, 'virtual_hosts'),
            domainRouters: Arr::get($data, 'domain_routers'),
            mailHostnames: Arr::get($data, 'mail_hostnames'),
            urlRedirects: Arr::get($data, 'url_redirects'),
            fpmPools: Arr::get($data, 'fpm_pools'),
            redisInstances: Arr::get($data, 'redis_instances'),
            passengerApps: Arr::get($data, 'passenger_apps'),
            nodes: Arr::get($data, 'nodes'),
            haproxyListens: Arr::get($data, 'haproxy_listens'),
            haproxyListensToNodes: Arr::get($data, 'haproxy_listens_to_nodes'),
            sshKeys: Arr::get($data, 'ssh_keys'),
            rootSshKeys: Arr::get($data, 'root_ssh_keys'),
            certificates: Arr::get($data, 'certificates'),
            certificateManagers: Arr::get($data, 'certificate_managers'),
            databases: Arr::get($data, 'databases'),
            databaseUsers: Arr::get($data, 'database_users'),
            databaseUserGrants: Arr::get($data, 'database_user_grants'),
            malwares: Arr::get($data, 'malwares'),
            cmses: Arr::get($data, 'cmses'),
            mailDomains: Arr::get($data, 'mail_domains'),
            mailAccounts: Arr::get($data, 'mail_accounts'),
            mailAliases: Arr::get($data, 'mail_aliases'),
            nodeAddOns: Arr::get($data, 'node_add_ons'),
        ));
    }
}
