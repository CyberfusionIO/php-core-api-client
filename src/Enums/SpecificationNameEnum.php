<?php

namespace Cyberfusion\CoreApi\Enums;

enum SpecificationNameEnum: string
{
    case ClusterSupportsBorgRepositories = 'Cluster supports Borg repositories';
    case ClusterSupportsMariaDBDatabaseBorgRepositories = 'Cluster supports MariaDB database Borg repositories';
    case ClusterSupportsUNIXUserBorgRepositories = 'Cluster supports UNIX user Borg repositories';
    case ClusterSupportsVirtualHosts = 'Cluster supports virtual hosts';
    case ClusterSupportsMariaDBEncryptionKeys = 'Cluster supports MariaDB encryption keys';
    case ClusterSupportsMariaDBDatabases = 'Cluster supports MariaDB databases';
    case ClusterSupportsMariaDBDatabaseUsers = 'Cluster supports MariaDB database users';
    case ClusterSupportsPostgreSQLDatabases = 'Cluster supports PostgreSQL databases';
    case ClusterSupportsPostgreSQLDatabaseUsers = 'Cluster supports PostgreSQL database users';
    case ClusterSupportsNginxVirtualHosts = 'Cluster supports nginx virtual hosts';
    case ClusterSupportsApacheVirtualHosts = 'Cluster supports Apache virtual hosts';
    case ClusterSupportsNginxCustomConfigs = 'Cluster supports nginx custom configs';
    case ClusterSupportsNginxCustomConfigSnippets = 'Cluster supports nginx custom config snippets';
    case ClusterSupportsApacheCustomConfigSnippets = 'Cluster supports Apache custom config snippets';
    case ClusterSupportsURLRedirects = 'Cluster supports URL redirects';
    case ClusterSupportsHtpasswdFiles = 'Cluster supports htpasswd files';
    case ClusterSupportsMailDomains = 'Cluster supports mail domains';
    case ClusterSupportsMailHostnames = 'Cluster supports mail hostnames';
    case ClusterSupportsFTPUsers = 'Cluster supports FTP users';
    case ClusterSupportsFPMPools = 'Cluster supports FPM pools';
    case ClusterSupportsPassengerApps = 'Cluster supports Passenger apps';
    case ClusterSupportsRedisInstances = 'Cluster supports Redis instances';
    case ClusterSupportsUNIXUsers = 'Cluster supports UNIX users';
    case ClusterSupportsFirewallRules = 'Cluster supports firewall rules';
    case ClusterSupportsFirewallGroups = 'Cluster supports firewall groups';
    case ClusterSupportsMaldetNodes = 'Cluster supports maldet nodes';
    case ClusterSupportsDockerNodes = 'Cluster supports Docker nodes';
    case ClusterSupportsFFmpegNodes = 'Cluster supports FFmpeg nodes';
    case ClusterSupportsGhostscriptNodes = 'Cluster supports Ghostscript nodes';
    case ClusterSupportsLibreOfficeNodes = 'Cluster supports LibreOffice nodes';
    case ClusterSupportsPuppeteerNodes = 'Cluster supports Puppeteer nodes';
    case ClusterSupportsClamAVNodes = 'Cluster supports ClamAV nodes';
    case ClusterSupportsGNUMailutilsNodes = 'Cluster supports GNU Mailutils nodes';
    case ClusterSupportsWkhtmltopdfNodes = 'Cluster supports wkhtmltopdf nodes';
    case ClusterSupportsImageMagickNodes = 'Cluster supports ImageMagick nodes';
    case ClusterSupportsHAProxyNodes = 'Cluster supports HAProxy nodes';
    case ClusterSupportsProFTPDNodes = 'Cluster supports ProFTPD nodes';
    case ClusterSupportsDovecotNodes = 'Cluster supports Dovecot nodes';
    case ClusterSupportsAdminNodes = 'Cluster supports admin nodes';
    case ClusterSupportsApacheNodes = 'Cluster supports Apache nodes';
    case ClusterSupportsNginxNodes = 'Cluster supports nginx nodes';
    case ClusterSupportsFastRedirectNodes = 'Cluster supports Fast Redirect nodes';
    case ClusterSupportsMariaDBNodes = 'Cluster supports MariaDB nodes';
    case ClusterSupportsPostgreSQLNodes = 'Cluster supports PostgreSQL nodes';
    case ClusterSupportsPHPNodes = 'Cluster supports PHP nodes';
    case ClusterSupportsComposerNodes = 'Cluster supports Composer nodes';
    case ClusterSupportsWPCLINodes = 'Cluster supports WP-CLI nodes';
    case ClusterSupportsNodeJSNodes = 'Cluster supports NodeJS nodes';
    case ClusterSupportsPassengerNodes = 'Cluster supports Passenger nodes';
    case ClusterSupportsKernelCareNodes = 'Cluster supports KernelCare nodes';
    case ClusterSupportsNewRelicNodes = 'Cluster supports New Relic nodes';
    case ClusterSupportsRedisNodes = 'Cluster supports Redis nodes';
    case ClusterSupportsMeilisearchNodes = 'Cluster supports Meilisearch nodes';
    case ClusterSupportsGrafanaNodes = 'Cluster supports Grafana nodes';
    case ClusterSupportsSingleStoreNodes = 'Cluster supports SingleStore nodes';
    case ClusterSupportsElasticsearchNodes = 'Cluster supports Elasticsearch nodes';
    case ClusterSupportsRabbitMQNodes = 'Cluster supports RabbitMQ nodes';
    case ClusterSupportsMetabaseNodes = 'Cluster supports Metabase nodes';
    case UNIXUserSupportsVirtualHosts = 'UNIX user supports virtual hosts';
    case UNIXUserSupportsMailDomains = 'UNIX user supports mail domains';
    case ClusterSupportsLoadBalancerServiceAccountServiceAccountToCluster = 'Cluster supports Load Balancer service account service account to cluster';
    case ClusterSupportsDomainRouters = 'Cluster supports domain routers';
}
