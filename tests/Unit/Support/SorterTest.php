<?php

namespace Cyberfusion\CoreApi\Tests\Unit\Support;

use Cyberfusion\CoreApi\Support\Sorter;
use PHPUnit\Framework\TestCase;

class SorterTest extends TestCase
{
    public function test_it_builds_the_sorter_url(): void
    {
        $sorter = new Sorter();

        $sorter
            ->add('name', 'ASC')
            ->add('status', 'DESC');

        $this->assertSame('sort=name%3AASC&sort=status%3ADESC', $sorter->toQuery());
    }
}
