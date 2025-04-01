<?php

namespace Cyberfusion\CoreApi\Enums;

enum ClusterGroupEnum: string
{
    case Web = 'Web';
    case Mail = 'Mail';
    case Database = 'Database';
    case BorgClient = 'Borg Client';
    case BorgServer = 'Borg Server';
    case Redirect = 'Redirect';
}
