<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class CertificatesSearchRequest extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function getMainCommonName(): string|null
    {
        return $this->getAttribute('main_common_name');
    }

    public function setMainCommonName(?string $mainCommonName): self
    {
        $this->setAttribute('main_common_name', $mainCommonName);
        return $this;
    }

    public function getCommonNames(): string|null
    {
        return $this->getAttribute('common_names');
    }

    public function setCommonNames(?string $commonNames): self
    {
        $this->setAttribute('common_names', $commonNames);
        return $this;
    }

    public function getClusterId(): int|null
    {
        return $this->getAttribute('cluster_id');
    }

    public function setClusterId(?int $clusterId): self
    {
        $this->setAttribute('cluster_id', $clusterId);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
        ))
            ->when(Arr::has($data, 'main_common_name'), fn (self $model) => $model->setMainCommonName(Arr::get($data, 'main_common_name')))
            ->when(Arr::has($data, 'common_names'), fn (self $model) => $model->setCommonNames(Arr::get($data, 'common_names')))
            ->when(Arr::has($data, 'cluster_id'), fn (self $model) => $model->setClusterId(Arr::get($data, 'cluster_id')));
    }
}
