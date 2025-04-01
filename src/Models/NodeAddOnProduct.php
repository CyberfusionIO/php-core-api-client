<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class NodeAddOnProduct extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(
        string $uuid,
        string $name,
        string $price,
        string $period,
        string $currency,
        ?int $ram = null,
        ?int $cores = null,
        ?int $disk = null,
    ) {
        $this->setUuid($uuid);
        $this->setName($name);
        $this->setPrice($price);
        $this->setPeriod($period);
        $this->setCurrency($currency);
        $this->setRam($ram);
        $this->setCores($cores);
        $this->setDisk($disk);
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
            ->length(min: 1, max: 64)
            ->regex('/^[a-zA-Z0-9 ]+$/')
            ->assert($name);
        $this->setAttribute('name', $name);
        return $this;
    }

    public function getRam(): int|null
    {
        return $this->getAttribute('ram');
    }

    public function setRam(?int $ram = null): self
    {
        $this->setAttribute('ram', $ram);
        return $this;
    }

    public function getCores(): int|null
    {
        return $this->getAttribute('cores');
    }

    public function setCores(?int $cores = null): self
    {
        $this->setAttribute('cores', $cores);
        return $this;
    }

    public function getDisk(): int|null
    {
        return $this->getAttribute('disk');
    }

    public function setDisk(?int $disk = null): self
    {
        $this->setAttribute('disk', $disk);
        return $this;
    }

    public function getPrice(): string
    {
        return $this->getAttribute('price');
    }

    public function setPrice(?string $price = null): self
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
            price: Arr::get($data, 'price'),
            period: Arr::get($data, 'period'),
            currency: Arr::get($data, 'currency'),
            ram: Arr::get($data, 'ram'),
            cores: Arr::get($data, 'cores'),
            disk: Arr::get($data, 'disk'),
        ));
    }
}
