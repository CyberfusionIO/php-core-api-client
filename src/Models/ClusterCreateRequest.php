<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class ClusterCreateRequest extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function __construct(int $customerId, int $regionId, string $description, bool $nfsEnabled)
    {
        $this->setCustomerId($customerId);
        $this->setRegionId($regionId);
        $this->setDescription($description);
        $this->setNfsEnabled($nfsEnabled);
    }

    public function getCustomerId(): int
    {
        return $this->getAttribute('customer_id');
    }

    public function setCustomerId(int $customerId): self
    {
        $this->setAttribute('customer_id', $customerId);
        return $this;
    }

    public function getRegionId(): int
    {
        return $this->getAttribute('region_id');
    }

    public function setRegionId(int $regionId): self
    {
        $this->setAttribute('region_id', $regionId);
        return $this;
    }

    public function getDescription(): string
    {
        return $this->getAttribute('description');
    }

    /**
     * @throws ValidationException
     */
    public function setDescription(string $description): self
    {
        Validator::create()
            ->length(min: 1, max: 255)
            ->regex('/^[a-zA-Z0-9-_. ]+$/')
            ->assert($description);
        $this->setAttribute('description', $description);
        return $this;
    }

    public function getNfsEnabled(): bool
    {
        return $this->getAttribute('nfs_enabled');
    }

    public function setNfsEnabled(bool $nfsEnabled): self
    {
        $this->setAttribute('nfs_enabled', $nfsEnabled);
        return $this;
    }

    public function getCephfsEnabled(): bool|null
    {
        return $this->getAttribute('cephfs_enabled');
    }

    public function setCephfsEnabled(?bool $cephfsEnabled): self
    {
        $this->setAttribute('cephfs_enabled', $cephfsEnabled);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            customerId: Arr::get($data, 'customer_id'),
            regionId: Arr::get($data, 'region_id'),
            description: Arr::get($data, 'description'),
            nfsEnabled: Arr::get($data, 'nfs_enabled'),
        ))
            ->when(Arr::has($data, 'cephfs_enabled'), fn (self $model) => $model->setCephfsEnabled(Arr::get($data, 'cephfs_enabled')));
    }
}
