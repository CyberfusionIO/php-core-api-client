<?php

namespace Cyberfusion\CoreApi\Enums;

enum SpecificationModeEnum: string
{
    case Single = 'Single';
    case Or = 'Or';
    case And = 'And';
}
