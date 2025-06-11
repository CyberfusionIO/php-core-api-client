<?php

namespace Cyberfusion\CoreApi\Support;

use Illuminate\Support\Arr;

class CertificateHelper
{
    private const CERTIFICATE_PATTERN = '(?:(-{5}BEGIN (?:[A-Z ]+)-{5})([A-Za-z0-9\s.:+=\/]+)(-{5}END [A-Z ]+-{5})\s*)';

    public static function isValid(?string $value, int $count = 1): bool
    {
        if (! is_string($value)) {
            return false;
        }

        return (bool) preg_match(sprintf('/^%s{%s}$/', self::CERTIFICATE_PATTERN, $count), $value);
    }

    public static function format(?string $value): ?string
    {
        if (! is_string($value)) {
            return null;
        }

        preg_match_all(
            pattern: sprintf('/%s/', self::CERTIFICATE_PATTERN),
            subject: $value,
            matches: $matches,
            flags: PREG_SET_ORDER
        );

        $certificates = Arr::map($matches, static fn (array $match) => [
            'begin'   => trim($match[1]),
            'content' => preg_replace('/\s+/', '', $match[2]),
            'end'     => trim($match[3]),
        ]);

        return implode("\n", Arr::map($certificates, static fn ($certificate) => implode("\n", $certificate) . "\n"));
    }
}
