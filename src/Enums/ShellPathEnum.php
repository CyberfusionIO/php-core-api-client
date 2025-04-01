<?php

namespace Cyberfusion\CoreApi\Enums;

enum ShellPathEnum: string
{
    case Bash = '/bin/bash';
    case Jailshell = '/usr/local/bin/jailshell';
    case Nologin = '/usr/sbin/nologin';
}
