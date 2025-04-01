<?php

namespace Cyberfusion\CoreApi\Enums;

enum BorgArchiveContentObjectTypeEnum: string
{
    case RegularFile = 'regular_file';
    case Directory = 'directory';
    case SymbolicLink = 'symbolic_link';
}
