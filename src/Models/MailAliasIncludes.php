<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class MailAliasIncludes extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function __construct(?MailDomainResource $mailDomain = null, ?ClusterResource $cluster = null)
    {
        $this->setMailDomain($mailDomain);
        $this->setCluster($cluster);
    }

    public function getMailDomain(): MailDomainResource|null
    {
        return $this->getAttribute('mail_domain');
    }

    public function setMailDomain(?MailDomainResource $mailDomain): self
    {
        $this->setAttribute('mail_domain', $mailDomain);
        return $this;
    }

    public function getCluster(): ClusterResource|null
    {
        return $this->getAttribute('cluster');
    }

    public function setCluster(?ClusterResource $cluster): self
    {
        $this->setAttribute('cluster', $cluster);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            mailDomain: Arr::get($data, 'mail_domain') !== null ? MailDomainResource::fromArray(Arr::get($data, 'mail_domain')) : null,
            cluster: Arr::get($data, 'cluster') !== null ? ClusterResource::fromArray(Arr::get($data, 'cluster')) : null,
        ));
    }
}
