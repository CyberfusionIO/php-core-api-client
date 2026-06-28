<?php

namespace Cyberfusion\CoreApi\Enums;

enum ProductTypeEnum: string
{
    case Node = 'Node';
    case NodeAddOn = 'Node Add-On';
    case IncomingIPAddress = 'Incoming IP Address';
    case OutgoingIPAddress = 'Outgoing IP Address';
}
