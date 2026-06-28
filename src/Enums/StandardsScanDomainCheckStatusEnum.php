<?php

namespace Cyberfusion\CoreApi\Enums;

enum StandardsScanDomainCheckStatusEnum: string
{
    case Completed = 'completed';
    case ResultsUnavailable = 'results_unavailable';
}
