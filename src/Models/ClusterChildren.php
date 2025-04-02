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
        ?array $firewallGroups = null,
        ?array $securityTxtPolicies = null,
        ?array $unixUsers = null,
        ?array $borgRepositories = null,
        ?array $ftpUsers = null,
        ?array $borgArchives = null,
        ?array $customConfigSnippets = null,
        ?array $customConfigs = null,
        ?array $unixUsersRabbitmqCredentials = null,
        ?array $tombstones = null,
        ?array $basicAuthenticationRealms = null,
        ?array $htpasswdUsers = null,
        ?array $crons = null,
        ?array $daemons = null,
        ?array $mariadbEncryptionKeys = null,
        ?array $firewallRules = null,
        ?array $hostsEntries = null,
        ?array $htpasswdFiles = null,
        ?array $virtualHosts = null,
        ?array $domainRouters = null,
        ?array $mailHostnames = null,
        ?array $urlRedirects = null,
        ?array $fpmPools = null,
        ?array $redisInstances = null,
        ?array $passengerApps = null,
        ?array $nodes = null,
        ?array $haproxyListens = null,
        ?array $haproxyListensToNodes = null,
        ?array $sshKeys = null,
        ?array $rootSshKeys = null,
        ?array $certificates = null,
        ?array $certificateManagers = null,
        ?array $databases = null,
        ?array $databaseUsers = null,
        ?array $databaseUserGrants = null,
        ?array $malwares = null,
        ?array $cmses = null,
        ?array $mailDomains = null,
        ?array $mailAccounts = null,
        ?array $mailAliases = null,
        ?array $nodeAddOns = null,
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

    public function getFirewallGroups(): array|null
    {
        return $this->getAttribute('firewallGroups');
    }

    public function setFirewallGroups(?array $firewallGroups = []): self
    {
        $this->setAttribute('firewall_groups', $firewallGroups);
        return $this;
    }

    public function getSecurityTxtPolicies(): array|null
    {
        return $this->getAttribute('securityTxtPolicies');
    }

    public function setSecurityTxtPolicies(?array $securityTxtPolicies = []): self
    {
        $this->setAttribute('security_txt_policies', $securityTxtPolicies);
        return $this;
    }

    public function getUnixUsers(): array|null
    {
        return $this->getAttribute('unixUsers');
    }

    public function setUnixUsers(?array $unixUsers = []): self
    {
        $this->setAttribute('unix_users', $unixUsers);
        return $this;
    }

    public function getBorgRepositories(): array|null
    {
        return $this->getAttribute('borgRepositories');
    }

    public function setBorgRepositories(?array $borgRepositories = []): self
    {
        $this->setAttribute('borg_repositories', $borgRepositories);
        return $this;
    }

    public function getFtpUsers(): array|null
    {
        return $this->getAttribute('ftpUsers');
    }

    public function setFtpUsers(?array $ftpUsers = []): self
    {
        $this->setAttribute('ftp_users', $ftpUsers);
        return $this;
    }

    public function getBorgArchives(): array|null
    {
        return $this->getAttribute('borgArchives');
    }

    public function setBorgArchives(?array $borgArchives = []): self
    {
        $this->setAttribute('borg_archives', $borgArchives);
        return $this;
    }

    public function getCustomConfigSnippets(): array|null
    {
        return $this->getAttribute('customConfigSnippets');
    }

    public function setCustomConfigSnippets(?array $customConfigSnippets = []): self
    {
        $this->setAttribute('custom_config_snippets', $customConfigSnippets);
        return $this;
    }

    public function getCustomConfigs(): array|null
    {
        return $this->getAttribute('customConfigs');
    }

    public function setCustomConfigs(?array $customConfigs = []): self
    {
        $this->setAttribute('custom_configs', $customConfigs);
        return $this;
    }

    public function getUnixUsersRabbitmqCredentials(): array|null
    {
        return $this->getAttribute('unixUsersRabbitmqCredentials');
    }

    public function setUnixUsersRabbitmqCredentials(?array $unixUsersRabbitmqCredentials = []): self
    {
        $this->setAttribute('unix_users_rabbitmq_credentials', $unixUsersRabbitmqCredentials);
        return $this;
    }

    public function getTombstones(): array|null
    {
        return $this->getAttribute('tombstones');
    }

    public function setTombstones(?array $tombstones = []): self
    {
        $this->setAttribute('tombstones', $tombstones);
        return $this;
    }

    public function getBasicAuthenticationRealms(): array|null
    {
        return $this->getAttribute('basicAuthenticationRealms');
    }

    public function setBasicAuthenticationRealms(?array $basicAuthenticationRealms = []): self
    {
        $this->setAttribute('basic_authentication_realms', $basicAuthenticationRealms);
        return $this;
    }

    public function getHtpasswdUsers(): array|null
    {
        return $this->getAttribute('htpasswdUsers');
    }

    public function setHtpasswdUsers(?array $htpasswdUsers = []): self
    {
        $this->setAttribute('htpasswd_users', $htpasswdUsers);
        return $this;
    }

    public function getCrons(): array|null
    {
        return $this->getAttribute('crons');
    }

    public function setCrons(?array $crons = []): self
    {
        $this->setAttribute('crons', $crons);
        return $this;
    }

    public function getDaemons(): array|null
    {
        return $this->getAttribute('daemons');
    }

    public function setDaemons(?array $daemons = []): self
    {
        $this->setAttribute('daemons', $daemons);
        return $this;
    }

    public function getMariadbEncryptionKeys(): array|null
    {
        return $this->getAttribute('mariadbEncryptionKeys');
    }

    public function setMariadbEncryptionKeys(?array $mariadbEncryptionKeys = []): self
    {
        $this->setAttribute('mariadb_encryption_keys', $mariadbEncryptionKeys);
        return $this;
    }

    public function getFirewallRules(): array|null
    {
        return $this->getAttribute('firewallRules');
    }

    public function setFirewallRules(?array $firewallRules = []): self
    {
        $this->setAttribute('firewall_rules', $firewallRules);
        return $this;
    }

    public function getHostsEntries(): array|null
    {
        return $this->getAttribute('hostsEntries');
    }

    public function setHostsEntries(?array $hostsEntries = []): self
    {
        $this->setAttribute('hosts_entries', $hostsEntries);
        return $this;
    }

    public function getHtpasswdFiles(): array|null
    {
        return $this->getAttribute('htpasswdFiles');
    }

    public function setHtpasswdFiles(?array $htpasswdFiles = []): self
    {
        $this->setAttribute('htpasswd_files', $htpasswdFiles);
        return $this;
    }

    public function getVirtualHosts(): array|null
    {
        return $this->getAttribute('virtualHosts');
    }

    public function setVirtualHosts(?array $virtualHosts = []): self
    {
        $this->setAttribute('virtual_hosts', $virtualHosts);
        return $this;
    }

    public function getDomainRouters(): array|null
    {
        return $this->getAttribute('domainRouters');
    }

    public function setDomainRouters(?array $domainRouters = []): self
    {
        $this->setAttribute('domain_routers', $domainRouters);
        return $this;
    }

    public function getMailHostnames(): array|null
    {
        return $this->getAttribute('mailHostnames');
    }

    public function setMailHostnames(?array $mailHostnames = []): self
    {
        $this->setAttribute('mail_hostnames', $mailHostnames);
        return $this;
    }

    public function getUrlRedirects(): array|null
    {
        return $this->getAttribute('urlRedirects');
    }

    public function setUrlRedirects(?array $urlRedirects = []): self
    {
        $this->setAttribute('url_redirects', $urlRedirects);
        return $this;
    }

    public function getFpmPools(): array|null
    {
        return $this->getAttribute('fpmPools');
    }

    public function setFpmPools(?array $fpmPools = []): self
    {
        $this->setAttribute('fpm_pools', $fpmPools);
        return $this;
    }

    public function getRedisInstances(): array|null
    {
        return $this->getAttribute('redisInstances');
    }

    public function setRedisInstances(?array $redisInstances = []): self
    {
        $this->setAttribute('redis_instances', $redisInstances);
        return $this;
    }

    public function getPassengerApps(): array|null
    {
        return $this->getAttribute('passengerApps');
    }

    public function setPassengerApps(?array $passengerApps = []): self
    {
        $this->setAttribute('passenger_apps', $passengerApps);
        return $this;
    }

    public function getNodes(): array|null
    {
        return $this->getAttribute('nodes');
    }

    public function setNodes(?array $nodes = []): self
    {
        $this->setAttribute('nodes', $nodes);
        return $this;
    }

    public function getHaproxyListens(): array|null
    {
        return $this->getAttribute('haproxyListens');
    }

    public function setHaproxyListens(?array $haproxyListens = []): self
    {
        $this->setAttribute('haproxy_listens', $haproxyListens);
        return $this;
    }

    public function getHaproxyListensToNodes(): array|null
    {
        return $this->getAttribute('haproxyListensToNodes');
    }

    public function setHaproxyListensToNodes(?array $haproxyListensToNodes = []): self
    {
        $this->setAttribute('haproxy_listens_to_nodes', $haproxyListensToNodes);
        return $this;
    }

    public function getSshKeys(): array|null
    {
        return $this->getAttribute('sshKeys');
    }

    public function setSshKeys(?array $sshKeys = []): self
    {
        $this->setAttribute('ssh_keys', $sshKeys);
        return $this;
    }

    public function getRootSshKeys(): array|null
    {
        return $this->getAttribute('rootSshKeys');
    }

    public function setRootSshKeys(?array $rootSshKeys = []): self
    {
        $this->setAttribute('root_ssh_keys', $rootSshKeys);
        return $this;
    }

    public function getCertificates(): array|null
    {
        return $this->getAttribute('certificates');
    }

    public function setCertificates(?array $certificates = []): self
    {
        $this->setAttribute('certificates', $certificates);
        return $this;
    }

    public function getCertificateManagers(): array|null
    {
        return $this->getAttribute('certificateManagers');
    }

    public function setCertificateManagers(?array $certificateManagers = []): self
    {
        $this->setAttribute('certificate_managers', $certificateManagers);
        return $this;
    }

    public function getDatabases(): array|null
    {
        return $this->getAttribute('databases');
    }

    public function setDatabases(?array $databases = []): self
    {
        $this->setAttribute('databases', $databases);
        return $this;
    }

    public function getDatabaseUsers(): array|null
    {
        return $this->getAttribute('databaseUsers');
    }

    public function setDatabaseUsers(?array $databaseUsers = []): self
    {
        $this->setAttribute('database_users', $databaseUsers);
        return $this;
    }

    public function getDatabaseUserGrants(): array|null
    {
        return $this->getAttribute('databaseUserGrants');
    }

    public function setDatabaseUserGrants(?array $databaseUserGrants = []): self
    {
        $this->setAttribute('database_user_grants', $databaseUserGrants);
        return $this;
    }

    public function getMalwares(): array|null
    {
        return $this->getAttribute('malwares');
    }

    public function setMalwares(?array $malwares = []): self
    {
        $this->setAttribute('malwares', $malwares);
        return $this;
    }

    public function getCmses(): array|null
    {
        return $this->getAttribute('cmses');
    }

    public function setCmses(?array $cmses = []): self
    {
        $this->setAttribute('cmses', $cmses);
        return $this;
    }

    public function getMailDomains(): array|null
    {
        return $this->getAttribute('mailDomains');
    }

    public function setMailDomains(?array $mailDomains = []): self
    {
        $this->setAttribute('mail_domains', $mailDomains);
        return $this;
    }

    public function getMailAccounts(): array|null
    {
        return $this->getAttribute('mailAccounts');
    }

    public function setMailAccounts(?array $mailAccounts = []): self
    {
        $this->setAttribute('mail_accounts', $mailAccounts);
        return $this;
    }

    public function getMailAliases(): array|null
    {
        return $this->getAttribute('mailAliases');
    }

    public function setMailAliases(?array $mailAliases = []): self
    {
        $this->setAttribute('mail_aliases', $mailAliases);
        return $this;
    }

    public function getNodeAddOns(): array|null
    {
        return $this->getAttribute('nodeAddOns');
    }

    public function setNodeAddOns(?array $nodeAddOns = []): self
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
