<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Cyberfusion\CoreApi\Support\ValidationHelper;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class MailAliasUpdateDeprecatedRequest extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(int $id, int $clusterId, string $localPart, int $mailDomainId)
    {
        $this->setId($id);
        $this->setClusterId($clusterId);
        $this->setLocalPart($localPart);
        $this->setMailDomainId($mailDomainId);
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

    public function getClusterId(): int
    {
        return $this->getAttribute('clusterId');
    }

    public function setClusterId(?int $clusterId = null): self
    {
        $this->setAttribute('clusterId', $clusterId);
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

    public function getForwardEmailAddresses(): array
    {
        return $this->getAttribute('forwardEmailAddresses');
    }

    /**
     * @throws ValidationException
     */
    public function setForwardEmailAddresses(array $forwardEmailAddresses): self
    {
        Validator::optional(Validator::create()
            ->unique())
            ->assert(ValidationHelper::prepareArray($forwardEmailAddresses));
        $this->setAttribute('forwardEmailAddresses', $forwardEmailAddresses);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            id: Arr::get($data, 'id'),
            clusterId: Arr::get($data, 'cluster_id'),
            localPart: Arr::get($data, 'local_part'),
            mailDomainId: Arr::get($data, 'mail_domain_id'),
        ))
            ->setForwardEmailAddresses(Arr::get($data, 'forward_email_addresses'));
    }
}
