<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class TombstoneDataMailAccount extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(
        int $id,
        string $localPart,
        int $mailDomainId,
        TombstoneDataMailAccountIncludes $includes,
    ) {
        $this->setId($id);
        $this->setLocalPart($localPart);
        $this->setMailDomainId($mailDomainId);
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

    public function getLocalPart(): string
    {
        return $this->getAttribute('local_part');
    }

    /**
     * @throws ValidationException
     */
    public function setLocalPart(?string $localPart = null): self
    {
        Validator::create()
            ->length(min: 1, max: 64)
            ->regex('/^[a-z0-9-.]+$/')
            ->assert($localPart);
        $this->setAttribute('local_part', $localPart);
        return $this;
    }

    public function getMailDomainId(): int
    {
        return $this->getAttribute('mail_domain_id');
    }

    public function setMailDomainId(?int $mailDomainId = null): self
    {
        $this->setAttribute('mail_domain_id', $mailDomainId);
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

    public function getIncludes(): TombstoneDataMailAccountIncludes
    {
        return $this->getAttribute('includes');
    }

    public function setIncludes(?TombstoneDataMailAccountIncludes $includes = null): self
    {
        $this->setAttribute('includes', $includes);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            id: Arr::get($data, 'id'),
            localPart: Arr::get($data, 'local_part'),
            mailDomainId: Arr::get($data, 'mail_domain_id'),
            includes: TombstoneDataMailAccountIncludes::fromArray(Arr::get($data, 'includes')),
        ))
            ->setDataType(Arr::get($data, 'data_type', 'mail_account'))
            ->setDeleteOnCluster(Arr::get($data, 'delete_on_cluster', false));
    }
}
