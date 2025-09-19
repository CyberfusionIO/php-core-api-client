<?php

namespace Cyberfusion\CoreApi\Enums;

enum ObjectLogTypeEnum: string
{
    case Create = 'Create';
    case Update = 'Update';
    case Delete = 'Delete';
}
