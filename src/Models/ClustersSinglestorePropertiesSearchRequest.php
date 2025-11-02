<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class ClustersSinglestorePropertiesSearchRequest extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function getSinglestoreStudioDomain(): string|null
    {
        return $this->getAttribute('singlestore_studio_domain');
    }

    public function setSinglestoreStudioDomain(?string $singlestoreStudioDomain): self
    {
        $this->setAttribute('singlestore_studio_domain', $singlestoreStudioDomain);
        return $this;
    }

    public function getSinglestoreApiDomain(): string|null
    {
        return $this->getAttribute('singlestore_api_domain');
    }

    public function setSinglestoreApiDomain(?string $singlestoreApiDomain): self
    {
        $this->setAttribute('singlestore_api_domain', $singlestoreApiDomain);
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
            ->when(Arr::has($data, 'singlestore_studio_domain'), fn (self $model) => $model->setSinglestoreStudioDomain(Arr::get($data, 'singlestore_studio_domain')))
            ->when(Arr::has($data, 'singlestore_api_domain'), fn (self $model) => $model->setSinglestoreApiDomain(Arr::get($data, 'singlestore_api_domain')))
            ->when(Arr::has($data, 'cluster_id'), fn (self $model) => $model->setClusterId(Arr::get($data, 'cluster_id')));
    }
}
