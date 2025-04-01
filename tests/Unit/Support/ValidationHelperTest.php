<?php

namespace Cyberfusion\CoreApi\Tests\Unit\Support;

use Cyberfusion\CoreApi\Support\ValidationHelper;
use PHPUnit\Framework\TestCase;

class ValidationHelperTest extends TestCase
{
    public function test_it_prepares_the_data(): void
    {
        $array = ['14.0', '14.1', '14.10'];

        $prepared = ValidationHelper::prepareArray($array);

        $this->assertTrue(in_array('14.0xx', $prepared));
        $this->assertTrue(in_array('14.1xx', $prepared));
        $this->assertTrue(in_array('14.10xx', $prepared));
    }

    public function test_it_skips_null_data(): void
    {
        $this->assertNull(ValidationHelper::prepareArray(null));
    }
}
