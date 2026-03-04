<?php

namespace Cyberfusion\CoreApi\Enums;

enum DeploymentStatusEnum: string
{
    case Pending = 'Pending';
    case Failed = 'Failed';
    case Succeeded = 'Succeeded';
}
