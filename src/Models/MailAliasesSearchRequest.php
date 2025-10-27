<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class MailAliasesSearchRequest extends CoreApiModel implements CoreApiModelContract
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

    public function getLocalPart(): string|null
    {
        return $this->getAttribute('local_part');
    }

    public function setLocalPart(?string $localPart): self
    {
        $this->setAttribute('local_part', $localPart);
        return $this;
    }

    public function getMailDomainId(): int|null
    {
        return $this->getAttribute('mail_domain_id');
    }

    public function setMailDomainId(?int $mailDomainId): self
    {
        $this->setAttribute('mail_domain_id', $mailDomainId);
        return $this;
    }

    public function getForwardEmailAddresses(): string|null
    {
        return $this->getAttribute('forward_email_addresses');
    }

    public function setForwardEmailAddresses(?string $forwardEmailAddresses): self
    {
        $this->setAttribute('forward_email_addresses', $forwardEmailAddresses);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
        ))
            ->when(Arr::has($data, 'cluster_id'), fn (self $model) => $model->setClusterId(Arr::get($data, 'cluster_id')))
            ->when(Arr::has($data, 'local_part'), fn (self $model) => $model->setLocalPart(Arr::get($data, 'local_part')))
            ->when(Arr::has($data, 'mail_domain_id'), fn (self $model) => $model->setMailDomainId(Arr::get($data, 'mail_domain_id')))
            ->when(Arr::has($data, 'forward_email_addresses'), fn (self $model) => $model->setForwardEmailAddresses(Arr::get($data, 'forward_email_addresses')));
    }
}
