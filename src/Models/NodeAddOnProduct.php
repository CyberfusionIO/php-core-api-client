<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

/**
 * Node add-on product properties.
 */
class NodeAddOnProduct extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function __construct(
        string $uuid,
        string $name,
        float $price,
        string $period,
        string $currency,
        ?int $memoryMib = null,
        ?int $cpuCores = null,
        ?int $diskGib = null,
    ) {
        $this->setUuid($uuid);
        $this->setName($name);
        $this->setPrice($price);
        $this->setPeriod($period);
        $this->setCurrency($currency);
        $this->setMemoryMib($memoryMib);
        $this->setCpuCores($cpuCores);
        $this->setDiskGib($diskGib);
    }

    public function getUuid(): string
    {
        return $this->getAttribute('uuid');
    }

    public function setUuid(string $uuid): self
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
    public function setName(string $name): self
    {
        Validator::create()
            ->length(min: 1, max: 64)
            ->regex('/^[a-zA-Z0-9 ]+$/')
            ->assert($name);
        $this->setAttribute('name', $name);
        return $this;
    }

    public function getMemoryMib(): int|null
    {
        return $this->getAttribute('memory_mib');
    }

    public function setMemoryMib(?int $memoryMib): self
    {
        $this->setAttribute('memory_mib', $memoryMib);
        return $this;
    }

    public function getCpuCores(): int|null
    {
        return $this->getAttribute('cpu_cores');
    }

    public function setCpuCores(?int $cpuCores): self
    {
        $this->setAttribute('cpu_cores', $cpuCores);
        return $this;
    }

    public function getDiskGib(): int|null
    {
        return $this->getAttribute('disk_gib');
    }

    public function setDiskGib(?int $diskGib): self
    {
        $this->setAttribute('disk_gib', $diskGib);
        return $this;
    }

    public function getPrice(): float
    {
        return $this->getAttribute('price');
    }

    public function setPrice(float $price): self
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
    public function setPeriod(string $period): self
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
    public function setCurrency(string $currency): self
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
            price: Arr::get($data, 'price'),
            period: Arr::get($data, 'period'),
            currency: Arr::get($data, 'currency'),
            memoryMib: Arr::get($data, 'memory_mib'),
            cpuCores: Arr::get($data, 'cpu_cores'),
            diskGib: Arr::get($data, 'disk_gib'),
        ));
    }
}
