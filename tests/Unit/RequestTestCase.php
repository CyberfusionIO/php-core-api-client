<?php

namespace Cyberfusion\CoreApi\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Saloon\Http\Faking\MockClient;

abstract class RequestTestCase extends TestCase
{
    protected function setUp(): void
    {
        MockClient::destroyGlobal();
    }
}
