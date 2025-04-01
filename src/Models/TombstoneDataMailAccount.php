<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class TombstoneDataMailAccount extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(string $localPart, int $mailDomainId)
    {
        $this->setLocalPart($localPart);
        $this->setMailDomainId($mailDomainId);
    }

    public function getDataType(): string
    {
        return $this->getAttribute('dataType');
    }

    public function setDataType(string $dataType): self
    {
        $this->setAttribute('dataType', $dataType);
        return $this;
    }

    public function getLocalPart(): string
    {
        return $this->getAttribute('localPart');
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
        $this->setAttribute('localPart', $localPart);
        return $this;
    }

    public function getMailDomainId(): int
    {
        return $this->getAttribute('mailDomainId');
    }

    public function setMailDomainId(?int $mailDomainId = null): self
    {
        $this->setAttribute('mailDomainId', $mailDomainId);
        return $this;
    }

    public function getDeleteOnCluster(): bool
    {
        return $this->getAttribute('deleteOnCluster');
    }

    public function setDeleteOnCluster(bool $deleteOnCluster): self
    {
        $this->setAttribute('deleteOnCluster', $deleteOnCluster);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            localPart: Arr::get($data, 'local_part'),
            mailDomainId: Arr::get($data, 'mail_domain_id'),
        ))
            ->setDataType(Arr::get($data, 'data_type'))
            ->setDeleteOnCluster(Arr::get($data, 'delete_on_cluster'));
    }
}
