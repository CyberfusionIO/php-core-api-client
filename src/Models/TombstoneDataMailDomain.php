<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

/**
 * Properties.
 */
class TombstoneDataMailDomain extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(int $id, string $domain, int $unixUserId, TombstoneDataMailDomainIncludes $includes)
    {
        $this->setId($id);
        $this->setDomain($domain);
        $this->setUnixUserId($unixUserId);
        $this->setIncludes($includes);
    }

    public function getDataType(): string
    {
        return $this->getAttribute('data_type');
    }

    public function setDataType(string $dataType): self
    {
        $this->setAttribute('data_type', $dataType);
        return $this;
    }

    public function getId(): int
    {
        return $this->getAttribute('id');
    }

    public function setId(?int $id = null): self
    {
        $this->setAttribute('id', $id);
        return $this;
    }

    public function getDomain(): string
    {
        return $this->getAttribute('domain');
    }

    public function setDomain(?string $domain = null): self
    {
        $this->setAttribute('domain', $domain);
        return $this;
    }

    public function getUnixUserId(): int
    {
        return $this->getAttribute('unix_user_id');
    }

    public function setUnixUserId(?int $unixUserId = null): self
    {
        $this->setAttribute('unix_user_id', $unixUserId);
        return $this;
    }

    public function getDeleteOnCluster(): bool
    {
        return $this->getAttribute('delete_on_cluster');
    }

    public function setDeleteOnCluster(bool $deleteOnCluster): self
    {
        $this->setAttribute('delete_on_cluster', $deleteOnCluster);
        return $this;
    }

    public function getIncludes(): TombstoneDataMailDomainIncludes
    {
        return $this->getAttribute('includes');
    }

    public function setIncludes(?TombstoneDataMailDomainIncludes $includes = null): self
    {
        $this->setAttribute('includes', $includes);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            id: Arr::get($data, 'id'),
            domain: Arr::get($data, 'domain'),
            unixUserId: Arr::get($data, 'unix_user_id'),
            includes: TombstoneDataMailDomainIncludes::fromArray(Arr::get($data, 'includes')),
        ))
            ->setDataType(Arr::get($data, 'data_type', 'mail_domain'))
            ->setDeleteOnCluster(Arr::get($data, 'delete_on_cluster', false));
    }
}
