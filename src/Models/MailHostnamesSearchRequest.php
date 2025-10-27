<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class MailHostnamesSearchRequest extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function getDomain(): string|null
    {
        return $this->getAttribute('domain');
    }

    public function setDomain(?string $domain): self
    {
        $this->setAttribute('domain', $domain);
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

    public function getCertificateId(): int|null
    {
        return $this->getAttribute('certificate_id');
    }

    public function setCertificateId(?int $certificateId): self
    {
        $this->setAttribute('certificate_id', $certificateId);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
        ))
            ->when(Arr::has($data, 'domain'), fn (self $model) => $model->setDomain(Arr::get($data, 'domain')))
            ->when(Arr::has($data, 'cluster_id'), fn (self $model) => $model->setClusterId(Arr::get($data, 'cluster_id')))
            ->when(Arr::has($data, 'certificate_id'), fn (self $model) => $model->setCertificateId(Arr::get($data, 'certificate_id')));
    }
}
