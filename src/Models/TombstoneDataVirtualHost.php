<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class TombstoneDataVirtualHost extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(string $domainRoot)
    {
        $this->setDomainRoot($domainRoot);
    }

    public function getDataType(): string
    {
        return $this->getAttribute('dataType');
    }

    public function setDataType(string $dataType): self
    {
        $this->setAttribute('data_type', $dataType);
        return $this;
    }

    public function getDomainRoot(): string
    {
        return $this->getAttribute('domainRoot');
    }

    public function setDomainRoot(?string $domainRoot = null): self
    {
        $this->setAttribute('domain_root', $domainRoot);
        return $this;
    }

    public function getDeleteOnCluster(): bool
    {
        return $this->getAttribute('deleteOnCluster');
    }

    public function setDeleteOnCluster(bool $deleteOnCluster): self
    {
        $this->setAttribute('delete_on_cluster', $deleteOnCluster);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            domainRoot: Arr::get($data, 'domain_root'),
        ))
            ->setDataType(Arr::get($data, 'data_type'))
            ->setDeleteOnCluster(Arr::get($data, 'delete_on_cluster'));
    }
}
