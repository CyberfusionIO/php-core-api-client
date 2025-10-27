<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Enums\IPAddressProductTypeEnum;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

/**
 * IP address product properties.
 */
class IPAddressProduct extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function __construct(
        string $uuid,
        string $name,
        IPAddressProductTypeEnum $type,
        float $price,
        string $period,
        string $currency,
    ) {
        $this->setUuid($uuid);
        $this->setName($name);
        $this->setType($type);
        $this->setPrice($price);
        $this->setPeriod($period);
        $this->setCurrency($currency);
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

    public function getType(): IPAddressProductTypeEnum
    {
        return $this->getAttribute('type');
    }

    public function setType(IPAddressProductTypeEnum $type): self
    {
        $this->setAttribute('type', $type);
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
            type: IPAddressProductTypeEnum::tryFrom(Arr::get($data, 'type')),
            price: Arr::get($data, 'price'),
            period: Arr::get($data, 'period'),
            currency: Arr::get($data, 'currency'),
        ));
    }
}
