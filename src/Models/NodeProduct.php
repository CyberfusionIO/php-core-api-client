<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

/**
 * Node product properties.
 */
class NodeProduct extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(
        string $uuid,
        string $name,
        int $memoryGib,
        int $cpuCores,
        int $diskGib,
        array $allowUpgradeTo,
        array $allowDowngradeTo,
        float $price,
        string $period,
        string $currency,
    ) {
        $this->setUuid($uuid);
        $this->setName($name);
        $this->setMemoryGib($memoryGib);
        $this->setCpuCores($cpuCores);
        $this->setDiskGib($diskGib);
        $this->setAllowUpgradeTo($allowUpgradeTo);
        $this->setAllowDowngradeTo($allowDowngradeTo);
        $this->setPrice($price);
        $this->setPeriod($period);
        $this->setCurrency($currency);
    }

    public function getUuid(): string
    {
        return $this->getAttribute('uuid');
    }

    public function setUuid(?string $uuid = null): self
    {
        $this->setAttribute('uuid', $uuid);
        return $this;
    }

    public function getName(): string
    {
        return $this->getAttribute('name');
    }

    /**
     * @throws ValidationException
     */
    public function setName(?string $name = null): self
    {
        Validator::create()
            ->length(min: 1, max: 2)
            ->regex('/^[A-Z]+$/')
            ->assert($name);
        $this->setAttribute('name', $name);
        return $this;
    }

    public function getMemoryGib(): int
    {
        return $this->getAttribute('memory_gib');
    }

    public function setMemoryGib(?int $memoryGib = null): self
    {
        $this->setAttribute('memory_gib', $memoryGib);
        return $this;
    }

    public function getCpuCores(): int
    {
        return $this->getAttribute('cpu_cores');
    }

    public function setCpuCores(?int $cpuCores = null): self
    {
        $this->setAttribute('cpu_cores', $cpuCores);
        return $this;
    }

    public function getDiskGib(): int
    {
        return $this->getAttribute('disk_gib');
    }

    public function setDiskGib(?int $diskGib = null): self
    {
        $this->setAttribute('disk_gib', $diskGib);
        return $this;
    }

    public function getAllowUpgradeTo(): array
    {
        return $this->getAttribute('allow_upgrade_to');
    }

    public function setAllowUpgradeTo(array $allowUpgradeTo = []): self
    {
        $this->setAttribute('allow_upgrade_to', $allowUpgradeTo);
        return $this;
    }

    public function getAllowDowngradeTo(): array
    {
        return $this->getAttribute('allow_downgrade_to');
    }

    public function setAllowDowngradeTo(array $allowDowngradeTo = []): self
    {
        $this->setAttribute('allow_downgrade_to', $allowDowngradeTo);
        return $this;
    }

    public function getPrice(): float
    {
        return $this->getAttribute('price');
    }

    public function setPrice(?float $price = null): self
    {
        $this->setAttribute('price', $price);
        return $this;
    }

    public function getPeriod(): string
    {
        return $this->getAttribute('period');
    }

    /**
     * @throws ValidationException
     */
    public function setPeriod(?string $period = null): self
    {
        Validator::create()
            ->length(min: 2, max: 2)
            ->regex('/^[A-Z0-9]+$/')
            ->assert($period);
        $this->setAttribute('period', $period);
        return $this;
    }

    public function getCurrency(): string
    {
        return $this->getAttribute('currency');
    }

    /**
     * @throws ValidationException
     */
    public function setCurrency(?string $currency = null): self
    {
        Validator::create()
            ->length(min: 3, max: 3)
            ->regex('/^[A-Z]+$/')
            ->assert($currency);
        $this->setAttribute('currency', $currency);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            uuid: Arr::get($data, 'uuid'),
            name: Arr::get($data, 'name'),
            memoryGib: Arr::get($data, 'memory_gib'),
            cpuCores: Arr::get($data, 'cpu_cores'),
            diskGib: Arr::get($data, 'disk_gib'),
            allowUpgradeTo: Arr::get($data, 'allow_upgrade_to'),
            allowDowngradeTo: Arr::get($data, 'allow_downgrade_to'),
            price: Arr::get($data, 'price'),
            period: Arr::get($data, 'period'),
            currency: Arr::get($data, 'currency'),
        ));
    }
}
