<?php

namespace Cyberfusion\CoreApi\Enums;

enum UNIXUserHomeDirectoryEnum: string
{
    case Vhosts = '/var/www/vhosts';
    case Www = '/var/www';
    case Home = '/home';
    case Mail = '/mnt/mail';
    case Backups = '/mnt/backups';
}
