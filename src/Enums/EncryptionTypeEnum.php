<?php

namespace Cyberfusion\CoreApi\Enums;

enum EncryptionTypeEnum: string
{
    case TLS = 'TLS';
    case SSL = 'SSL';
    case STARTTLS = 'STARTTLS';
}
