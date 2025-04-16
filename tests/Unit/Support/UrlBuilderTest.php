<?php

namespace Cyberfusion\CoreApi\Tests\Unit\Support;

use Cyberfusion\CoreApi\Support\Filter;
use Cyberfusion\CoreApi\Support\Sorter;
use Cyberfusion\CoreApi\Support\UrlBuilder;
use PHPUnit\Framework\TestCase;

class UrlBuilderTest extends TestCase
{
    public function test_it_builds_url(): void
    {
        $builder = UrlBuilder::for('https://core-api.cyberfusion.io/api/%s/')
            ->filter((new Filter())->add('name', 'test'))
            ->sorter((new Sorter())->add('name', 'asc'))
            ->addPathParameter('v1')
            ->addQueryParameter('page', 1);

        $this->assertSame('https://core-api.cyberfusion.io/api/v1/?page=1&filter=name%3Atest&sort=name%3AASC', $builder->getEndpoint());
    }

    public function test_it_builds_without_query_parameters_provided(): void
    {
        $builder = UrlBuilder::for('https://core-api.cyberfusion.io/api/%s/')
            ->filter((new Filter())->add('name', 'test'))
            ->sorter((new Sorter())->add('name', 'asc'))
            ->addPathParameter('v1');

        $this->assertSame('https://core-api.cyberfusion.io/api/v1/?filter=name%3Atest&sort=name%3AASC', $builder->getEndpoint());
    }
}
