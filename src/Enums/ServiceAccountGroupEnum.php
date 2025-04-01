<?php

namespace Cyberfusion\CoreApi\Enums;

enum ServiceAccountGroupEnum: string
{
    case SecurityTXTPolicyServer = 'Security TXT Policy Server';
    case LoadBalancer = 'Load Balancer';
    case MailProxy = 'Mail Proxy';
    case MailGateway = 'Mail Gateway';
    case InternetRouter = 'Internet Router';
    case StorageRouter = 'Storage Router';
    case PhpMyAdmin = 'phpMyAdmin';
}
