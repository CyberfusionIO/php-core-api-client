<?php

namespace Cyberfusion\CoreApi\Enums;

enum StandardsScanDnssecStatusEnum: string
{
    case Signed = 'signed';
    case NotConfigured = 'not_configured';
    case InvalidSignature = 'invalid_signature';
    case UnsupportedAlgorithm = 'unsupported_algorithm';
    case ResolverError = 'resolver_error';
    case DnsError = 'dns_error';
}
