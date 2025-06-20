<?php

namespace Cyberfusion\CoreApi\Tests\Unit\Support;

use Cyberfusion\CoreApi\Enums\VirtualHostServerSoftwareNameEnum;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use PHPUnit\Framework\TestCase;

class CoreApiModelTest extends TestCase
{
    private function getModel(): CoreApiModel
    {
        return new class () extends CoreApiModel {
            public function getText(): ?string
            {
                return $this->getAttribute('text');
            }

            public function hasText(): bool
            {
                return $this->hasAttribute('text');
            }

            public function setText(string $text): void
            {
                $this->setAttribute('text', $text);
            }

            public function getMissingProperty(): mixed
            {
                return $this->getAttribute('missing_property');
            }

            public function getVirtualHostServerSoftwareNameEnum(): ?VirtualHostServerSoftwareNameEnum
            {
                return $this->getAttribute('virtual_host_software_name');
            }

            public function setVirtualHostServerSoftwareNameEnum(?VirtualHostServerSoftwareNameEnum $enum): void
            {
                $this->setAttribute('virtual_host_software_name', $enum);
            }
        };
    }

    public function test_it_behaves_like_a_model(): void
    {
        $model = $this->getModel();
        $model->setText('text'); // @phpstan-ignore-line
        $model->setVirtualHostServerSoftwareNameEnum(VirtualHostServerSoftwareNameEnum::Apache); // @phpstan-ignore-line

        $this->assertSame('text', $model->getText()); // @phpstan-ignore-line
        $this->assertTrue($model->hasText()); // @phpstan-ignore-line
        $this->assertNull($model->getMissingProperty()); // @phpstan-ignore-line

        $array = $model->toArray();

        $this->assertArrayHasKey('text', $array);
        $this->assertSame('text', $array['text']);
        $this->assertSame(VirtualHostServerSoftwareNameEnum::Apache->value, $array['virtual_host_software_name']);
    }
}
