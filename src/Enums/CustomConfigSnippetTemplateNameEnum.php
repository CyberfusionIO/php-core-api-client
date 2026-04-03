<?php

namespace Cyberfusion\CoreApi\Enums;

enum CustomConfigSnippetTemplateNameEnum: string
{
    case Laravel = 'Laravel';
    case Compression = 'Compression';
    case Blitz = 'Blitz';
    case Craft = 'Craft';
    case WordPress = 'WordPress';
}
