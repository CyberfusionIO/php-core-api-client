<?php

namespace Cyberfusion\CoreApi\Enums;

enum StandardsScanCheckStatusEnum: string
{
    case RegisteringDomains = 'registering_domains';
    case TestingDomains = 'testing_domains';
    case GeneratingReport = 'generating_report';
    case Completed = 'completed';
    case Cancelled = 'cancelled';
    case RegistrationFailed = 'registration_failed';
}
