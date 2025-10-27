<?php

namespace Cyberfusion\CoreApi\Enums;

enum NodeGroupEnum: string
{
    case Admin = 'Admin';
    case Apache = 'Apache';
    case ProFTPD = 'ProFTPD';
    case Nginx = 'nginx';
    case Dovecot = 'Dovecot';
    case MariaDB = 'MariaDB';
    case PostgreSQL = 'PostgreSQL';
    case PHP = 'PHP';
    case Passenger = 'Passenger';
    case FastRedirect = 'Fast Redirect';
    case HAProxy = 'HAProxy';
    case Redis = 'Redis';
    case Composer = 'Composer';
    case WPCLI = 'WP-CLI';
    case KernelCare = 'KernelCare';
    case ImageMagick = 'ImageMagick';
    case Wkhtmltopdf = 'wkhtmltopdf';
    case GNUMailutils = 'GNU Mailutils';
    case ClamAV = 'ClamAV';
    case Puppeteer = 'Puppeteer';
    case LibreOffice = 'LibreOffice';
    case Ghostscript = 'Ghostscript';
    case FFmpeg = 'FFmpeg';
    case Docker = 'Docker';
    case Meilisearch = 'Meilisearch';
    case NewRelic = 'New Relic';
    case Maldet = 'maldet';
    case NodeJS = 'NodeJS';
    case Grafana = 'Grafana';
    case SingleStore = 'SingleStore';
    case Metabase = 'Metabase';
    case Elasticsearch = 'Elasticsearch';
    case RabbitMQ = 'RabbitMQ';
}
