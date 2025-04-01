<?php

namespace Cyberfusion\CoreApi\Enums;

enum ObjectModelNameEnum: string
{
    case BorgArchive = 'BorgArchive';
    case BorgRepository = 'BorgRepository';
    case ServiceAccountToCluster = 'ServiceAccountToCluster';
    case Site = 'Site';
    case ServiceAccountToCustomer = 'ServiceAccountToCustomer';
    case Cluster = 'Cluster';
    case Customer = 'Customer';
    case CMS = 'CMS';
    case FPMPool = 'FPMPool';
    case VirtualHost = 'VirtualHost';
    case PassengerApp = 'PassengerApp';
    case Database = 'Database';
    case CertificateManager = 'CertificateManager';
    case BasicAuthenticationRealm = 'BasicAuthenticationRealm';
    case Cron = 'Cron';
    case Daemon = 'Daemon';
    case MariaDBEncryptionKey = 'MariaDBEncryptionKey';
    case FirewallRule = 'FirewallRule';
    case HostsEntry = 'HostsEntry';
    case NodeAddOn = 'NodeAddOn';
    case IPAddress = 'IPAddress';
    case SecurityTXTPolicy = 'SecurityTXTPolicy';
    case DatabaseUser = 'DatabaseUser';
    case DatabaseUserGrant = 'DatabaseUserGrant';
    case HtpasswdFile = 'HtpasswdFile';
    case HtpasswdUser = 'HtpasswdUser';
    case MailAccount = 'MailAccount';
    case MailAlias = 'MailAlias';
    case MailDomain = 'MailDomain';
    case Node = 'Node';
    case RedisInstance = 'RedisInstance';
    case DomainRouter = 'DomainRouter';
    case MailHostname = 'MailHostname';
    case Certificate = 'Certificate';
    case RootSSHKey = 'RootSSHKey';
    case SSHKey = 'SSHKey';
    case UNIXUser = 'UNIXUser';
    case UNIXUserRabbitMQCredentials = 'UNIXUserRabbitMQCredentials';
    case HAProxyListen = 'HAProxyListen';
    case HAProxyListenToNode = 'HAProxyListenToNode';
    case URLRedirect = 'URLRedirect';
    case SiteToCustomer = 'SiteToCustomer';
    case ServiceAccount = 'ServiceAccount';
    case ServiceAccountServer = 'ServiceAccountServer';
}
