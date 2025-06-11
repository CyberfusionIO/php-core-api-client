<?php

namespace Cyberfusion\CoreApi\Tests\Unit\Support;

use Cyberfusion\CoreApi\Support\CertificateHelper;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class CertificateHelperTest extends TestCase
{
    public static function certificateValidation(): array
    {
        return [
            ["-----BEGIN CERTIFICATE-----\ntest\ntest\n-----END CERTIFICATE-----", 1, true],
            ["-----BEGIN CERTIFICATE-----\ntest\ntest\n-----END CERTIFICATE-----\n-----BEGIN CERTIFICATE-----\ntest\ntest\n-----END CERTIFICATE-----", 2, true],
            [123, 1, false],
        ];
    }

    #[DataProvider('certificateValidation')]
    public function test_validation(mixed $source, int $count, bool $expected): void
    {
        $result = CertificateHelper::isValid(
            value: $source,
            count: $count,
        );

        $this->assertSame(
            expected: $expected,
            actual: $result,
            message: sprintf(
                'Certificate validation expected `%s`, but got `%s`',
                $expected ? 'true' : 'false',
                $result ? 'true' : 'false',
            ),
        );
    }

    public static function certificateFormatting(): array
    {
        return [
            [
                "-----BEGIN CERTIFICATE-----
test
test
-----END CERTIFICATE-----",
                "-----BEGIN CERTIFICATE-----\ntesttest\n-----END CERTIFICATE-----\n",
            ],
            [
                null,
                null,
            ],
        ];
    }

    #[DataProvider('certificateFormatting')]
    public function test_formatting(mixed $source, mixed $expected): void
    {
        $this->assertSame(
            expected: $expected,
            actual: CertificateHelper::format($source),
        );
    }
}
