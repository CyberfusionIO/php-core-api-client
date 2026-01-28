<?php

namespace Cyberfusion\CoreApi\Enums;

enum DomainRouterCategoryEnum: string
{
    case Grafana = 'Grafana';
    case SingleStoreStudio = 'SingleStore Studio';
    case SingleStoreAPI = 'SingleStore API';
    case Metabase = 'Metabase';
    case Kibana = 'Kibana';
    case RabbitMQManagement = 'RabbitMQ Management';
    case N8n = 'n8n';
    case VirtualHost = 'Virtual Host';
    case URLRedirect = 'URL Redirect';
}
