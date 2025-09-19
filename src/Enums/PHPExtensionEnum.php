<?php

namespace Cyberfusion\CoreApi\Enums;

enum PHPExtensionEnum: string
{
    case Redis = 'redis';
    case Imagick = 'imagick';
    case Sqlite3 = 'sqlite3';
    case Intl = 'intl';
    case Bcmath = 'bcmath';
    case Xdebug = 'xdebug';
    case Pgsql = 'pgsql';
    case Ssh2 = 'ssh2';
    case Ldap = 'ldap';
    case Mcrypt = 'mcrypt';
    case Xmlrpc = 'xmlrpc';
    case Apcu = 'apcu';
    case Tideways = 'tideways';
    case Sqlsrv = 'sqlsrv';
    case Gmp = 'gmp';
    case Vips = 'vips';
    case Excimer = 'excimer';
    case Mailparse = 'mailparse';
    case Uv = 'uv';
    case Amqp = 'amqp';
    case Mongodb = 'mongodb';
}
