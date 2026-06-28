<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Enums\ProductTypeEnum;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class ProductResource extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function __construct(
        int $id,
        string $createdAt,
        string $updatedAt,
        string $externalId,
        string $name,
        string $identifier,
        ProductTypeEnum $type,
        array $allowUpgradeTo,
        array $allowDowngradeTo,
        float $price,
        string $period,
        string $currency,
        ?int $memoryMib = null,
        ?int $cpuCores = null,
        ?int $diskGib = null,
    ) {
        $this->setId($id);
        $this->setCreatedAt($createdAt);
        $this->setUpdatedAt($updatedAt);
        $this->setExternalId($externalId);
        $this->setName($name);
        $this->setIdentifier($identifier);
        $this->setType($type);
        $this->setAllowUpgradeTo($allowUpgradeTo);
        $this->setAllowDowngradeTo($allowDowngradeTo);
        $this->setPrice($price);
        $this->setPeriod($period);
        $this->setCurrency($currency);
        $this->setMemoryMib($memoryMib);
        $this->setCpuCores($cpuCores);
        $this->setDiskGib($diskGib);
    }

    public function getId(): int
    {
        return $this->getAttribute('id');
    }

    public function setId(int $id): self
    {
        $this->setAttribute('id', $id);
        return $this;
    }

    public function getCreatedAt(): string
    {
        return $this->getAttribute('created_at');
    }

    public function setCreatedAt(string $createdAt): self
    {
        $this->setAttribute('created_at', $createdAt);
        return $this;
    }

    public function getUpdatedAt(): string
    {
        return $this->getAttribute('updated_at');
    }

    public function setUpdatedAt(string $updatedAt): self
    {
        $this->setAttribute('updated_at', $updatedAt);
        return $this;
    }

    public function getExternalId(): string
    {
        return $this->getAttribute('external_id');
    }

    public function setExternalId(string $externalId): self
    {
        $this->setAttribute('external_id', $externalId);
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

    public function getIdentifier(): string
    {
        return $this->getAttribute('identifier');
    }

    /**
     * @throws ValidationException
     */
    public function setIdentifier(string $identifier): self
    {
        Validator::create()
            ->length(min: 1, max: 64)
            ->regex('/^[a-zA-Z0-9- ]+$/')
            ->assert($identifier);
        $this->setAttribute('identifier', $identifier);
        return $this;
    }

    public function getType(): ProductTypeEnum
    {
        return $this->getAttribute('type');
    }

    public function setType(ProductTypeEnum $type): self
    {
        $this->setAttribute('type', $type);
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

    public function getAllowUpgradeTo(): array
    {
        return $this->getAttribute('allow_upgrade_to');
    }

    public function setAllowUpgradeTo(array $allowUpgradeTo): self
    {
        $this->setAttribute('allow_upgrade_to', $allowUpgradeTo);
        return $this;
    }

    public function getAllowDowngradeTo(): array
    {
        return $this->getAttribute('allow_downgrade_to');
    }

    public function setAllowDowngradeTo(array $allowDowngradeTo): self
    {
        $this->setAttribute('allow_downgrade_to', $allowDowngradeTo);
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
            id: Arr::get($data, 'id'),
            createdAt: Arr::get($data, 'created_at'),
            updatedAt: Arr::get($data, 'updated_at'),
            externalId: Arr::get($data, 'external_id'),
            name: Arr::get($data, 'name'),
            identifier: Arr::get($data, 'identifier'),
            type: ProductTypeEnum::tryFrom(Arr::get($data, 'type')),
            allowUpgradeTo: Arr::get($data, 'allow_upgrade_to'),
            allowDowngradeTo: Arr::get($data, 'allow_downgrade_to'),
            price: Arr::get($data, 'price'),
            period: Arr::get($data, 'period'),
            currency: Arr::get($data, 'currency'),
            memoryMib: Arr::get($data, 'memory_mib'),
            cpuCores: Arr::get($data, 'cpu_cores'),
            diskGib: Arr::get($data, 'disk_gib'),
        ));
    }
}
