<?php

namespace Cyberfusion\CoreApi\Tests\Unit\Support;

use Cyberfusion\CoreApi\Support\Filter;
use PHPUnit\Framework\TestCase;

class FilterTest extends TestCase
{
    public function test_it_builds_the_filter_url(): void
    {
        $filter = new Filter();

        $filter
            ->add('name', 'test')
            ->add('status', 'active')
            ->add('status', 'pending');

        $this->assertSame('filter=name%3Atest&filter=status%3Aactive&filter=status%3Apending', $filter->toQuery());
    }
}
