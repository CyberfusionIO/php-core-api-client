<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Enums\CMSSoftwareNameEnum;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class CmsesSearchRequest extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function getClusterId(): int|null
    {
        return $this->getAttribute('cluster_id');
    }

    public function setClusterId(?int $clusterId): self
    {
        $this->setAttribute('cluster_id', $clusterId);
        return $this;
    }

    public function getSoftwareName(): CMSSoftwareNameEnum|null
    {
        return $this->getAttribute('software_name');
    }

    public function setSoftwareName(?CMSSoftwareNameEnum $softwareName): self
    {
        $this->setAttribute('software_name', $softwareName);
        return $this;
    }

    public function getIsManuallyCreated(): bool|null
    {
        return $this->getAttribute('is_manually_created');
    }

    public function setIsManuallyCreated(?bool $isManuallyCreated): self
    {
        $this->setAttribute('is_manually_created', $isManuallyCreated);
        return $this;
    }

    public function getVirtualHostId(): int|null
    {
        return $this->getAttribute('virtual_host_id');
    }

    public function setVirtualHostId(?int $virtualHostId): self
    {
        $this->setAttribute('virtual_host_id', $virtualHostId);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
        ))
            ->when(Arr::has($data, 'cluster_id'), fn (self $model) => $model->setClusterId(Arr::get($data, 'cluster_id')))
            ->when(Arr::has($data, 'software_name'), fn (self $model) => $model->setSoftwareName(Arr::get($data, 'software_name') !== null ? CMSSoftwareNameEnum::tryFrom(Arr::get($data, 'software_name')) : null))
            ->when(Arr::has($data, 'is_manually_created'), fn (self $model) => $model->setIsManuallyCreated(Arr::get($data, 'is_manually_created')))
            ->when(Arr::has($data, 'virtual_host_id'), fn (self $model) => $model->setVirtualHostId(Arr::get($data, 'virtual_host_id')));
    }
}
