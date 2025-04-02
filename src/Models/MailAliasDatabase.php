<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Cyberfusion\CoreApi\Support\ValidationHelper;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

/**
 * Properties.
 */
class MailAliasDatabase extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(
        int $id,
        string $createdAt,
        string $updatedAt,
        int $clusterId,
        string $localPart,
        int $mailDomainId,
        array $forwardEmailAddresses,
    ) {
        $this->setId($id);
        $this->setCreatedAt($createdAt);
        $this->setUpdatedAt($updatedAt);
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

    public function getCreatedAt(): string
    {
        return $this->getAttribute('createdAt');
    }

    public function setCreatedAt(?string $createdAt = null): self
    {
        $this->setAttribute('created_at', $createdAt);
        return $this;
    }

    public function getUpdatedAt(): string
    {
        return $this->getAttribute('updatedAt');
    }

    public function setUpdatedAt(?string $updatedAt = null): self
    {
        $this->setAttribute('updated_at', $updatedAt);
        return $this;
    }

    public function getClusterId(): int
    {
        return $this->getAttribute('clusterId');
    }

    public function setClusterId(?int $clusterId = null): self
    {
        $this->setAttribute('cluster_id', $clusterId);
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
        $this->setAttribute('local_part', $localPart);
        return $this;
    }

    public function getMailDomainId(): int
    {
        return $this->getAttribute('mailDomainId');
    }

    public function setMailDomainId(?int $mailDomainId = null): self
    {
        $this->setAttribute('mail_domain_id', $mailDomainId);
        return $this;
    }

    public function getForwardEmailAddresses(): array
    {
        return $this->getAttribute('forwardEmailAddresses');
    }

    /**
     * @throws ValidationException
     */
    public function setForwardEmailAddresses(?array $forwardEmailAddresses = null): self
    {
        Validator::create()
            ->unique()
            ->assert(ValidationHelper::prepareArray($forwardEmailAddresses));
        $this->setAttribute('forward_email_addresses', $forwardEmailAddresses);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            id: Arr::get($data, 'id'),
            createdAt: Arr::get($data, 'created_at'),
            updatedAt: Arr::get($data, 'updated_at'),
            clusterId: Arr::get($data, 'cluster_id'),
            localPart: Arr::get($data, 'local_part'),
            mailDomainId: Arr::get($data, 'mail_domain_id'),
            forwardEmailAddresses: Arr::get($data, 'forward_email_addresses'),
        ));
    }
}
