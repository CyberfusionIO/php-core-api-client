<?php

namespace Cyberfusion\CoreApi\Enums;

enum UnixUserHomeDirectoryEnum: string
{
    case Vhosts = '/var/www/vhosts';
    case Www = '/var/www';
    case Home = '/home';
    case Mail = '/mnt/mail';
    case Backups = '/mnt/backups';
}
