<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class MailAliasUpdateDeprecatedRequest extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(
        int $id,
        int $clusterId,
        string $localPart,
        int $mailDomainId,
        array $forwardEmailAddresses,
    ) {
        $this->setId($id);
        $this->setClusterId($clusterId);
        $this->setLocalPart($localPart);
        $this->setMailDomainId($mailDomainId);
        $this->setForwardEmailAddresses($forwardEmailAddresses);
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
        return $this->getAttribute('cluster_id');
    }

    public function setClusterId(?int $clusterId = null): self
    {
        $this->setAttribute('cluster_id', $clusterId);
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

    public function getForwardEmailAddresses(): array
    {
        return $this->getAttribute('forward_email_addresses');
    }

    /**
     * @throws ValidationException
     */
    public function setForwardEmailAddresses(array $forwardEmailAddresses = []): self
    {
        Validator::create()
            ->unique()
            ->assert($forwardEmailAddresses);
        $this->setAttribute('forward_email_addresses', $forwardEmailAddresses);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            id: Arr::get($data, 'id'),
            clusterId: Arr::get($data, 'cluster_id'),
            localPart: Arr::get($data, 'local_part'),
            mailDomainId: Arr::get($data, 'mail_domain_id'),
            forwardEmailAddresses: Arr::get($data, 'forward_email_addresses'),
        ));
    }
}
