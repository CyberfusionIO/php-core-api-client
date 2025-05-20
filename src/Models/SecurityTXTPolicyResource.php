<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class SecurityTXTPolicyResource extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(
        int $id,
        string $createdAt,
        string $updatedAt,
        int $clusterId,
        string $expiresTimestamp,
        array $emailContacts,
        array $urlContacts,
        array $encryptionKeyUrls,
        array $acknowledgmentUrls,
        array $policyUrls,
        array $openingUrls,
        array $preferredLanguages,
    ) {
        $this->setId($id);
        $this->setCreatedAt($createdAt);
        $this->setUpdatedAt($updatedAt);
        $this->setClusterId($clusterId);
        $this->setExpiresTimestamp($expiresTimestamp);
        $this->setEmailContacts($emailContacts);
        $this->setUrlContacts($urlContacts);
        $this->setEncryptionKeyUrls($encryptionKeyUrls);
        $this->setAcknowledgmentUrls($acknowledgmentUrls);
        $this->setPolicyUrls($policyUrls);
        $this->setOpeningUrls($openingUrls);
        $this->setPreferredLanguages($preferredLanguages);
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
        return $this->getAttribute('created_at');
    }

    public function setCreatedAt(?string $createdAt = null): self
    {
        $this->setAttribute('created_at', $createdAt);
        return $this;
    }

    public function getUpdatedAt(): string
    {
        return $this->getAttribute('updated_at');
    }

    public function setUpdatedAt(?string $updatedAt = null): self
    {
        $this->setAttribute('updated_at', $updatedAt);
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

    public function getExpiresTimestamp(): string
    {
        return $this->getAttribute('expires_timestamp');
    }

    public function setExpiresTimestamp(?string $expiresTimestamp = null): self
    {
        $this->setAttribute('expires_timestamp', $expiresTimestamp);
        return $this;
    }

    public function getEmailContacts(): array
    {
        return $this->getAttribute('email_contacts');
    }

    /**
     * @throws ValidationException
     */
    public function setEmailContacts(array $emailContacts = []): self
    {
        Validator::create()
            ->unique()
            ->assert($emailContacts);
        $this->setAttribute('email_contacts', $emailContacts);
        return $this;
    }

    public function getUrlContacts(): array
    {
        return $this->getAttribute('url_contacts');
    }

    /**
     * @throws ValidationException
     */
    public function setUrlContacts(array $urlContacts = []): self
    {
        Validator::create()
            ->unique()
            ->assert($urlContacts);
        $this->setAttribute('url_contacts', $urlContacts);
        return $this;
    }

    public function getEncryptionKeyUrls(): array
    {
        return $this->getAttribute('encryption_key_urls');
    }

    /**
     * @throws ValidationException
     */
    public function setEncryptionKeyUrls(array $encryptionKeyUrls = []): self
    {
        Validator::create()
            ->unique()
            ->assert($encryptionKeyUrls);
        $this->setAttribute('encryption_key_urls', $encryptionKeyUrls);
        return $this;
    }

    public function getAcknowledgmentUrls(): array
    {
        return $this->getAttribute('acknowledgment_urls');
    }

    /**
     * @throws ValidationException
     */
    public function setAcknowledgmentUrls(array $acknowledgmentUrls = []): self
    {
        Validator::create()
            ->unique()
            ->assert($acknowledgmentUrls);
        $this->setAttribute('acknowledgment_urls', $acknowledgmentUrls);
        return $this;
    }

    public function getPolicyUrls(): array
    {
        return $this->getAttribute('policy_urls');
    }

    /**
     * @throws ValidationException
     */
    public function setPolicyUrls(array $policyUrls = []): self
    {
        Validator::create()
            ->unique()
            ->assert($policyUrls);
        $this->setAttribute('policy_urls', $policyUrls);
        return $this;
    }

    public function getOpeningUrls(): array
    {
        return $this->getAttribute('opening_urls');
    }

    /**
     * @throws ValidationException
     */
    public function setOpeningUrls(array $openingUrls = []): self
    {
        Validator::create()
            ->unique()
            ->assert($openingUrls);
        $this->setAttribute('opening_urls', $openingUrls);
        return $this;
    }

    public function getPreferredLanguages(): array
    {
        return $this->getAttribute('preferred_languages');
    }

    /**
     * @throws ValidationException
     */
    public function setPreferredLanguages(array $preferredLanguages = []): self
    {
        Validator::create()
            ->unique()
            ->assert($preferredLanguages);
        $this->setAttribute('preferred_languages', $preferredLanguages);
        return $this;
    }

    public function getIncludes(): SecurityTXTPolicyIncludes|null
    {
        return $this->getAttribute('includes');
    }

    public function setIncludes(?SecurityTXTPolicyIncludes $includes): self
    {
        $this->setAttribute('includes', $includes);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            id: Arr::get($data, 'id'),
            createdAt: Arr::get($data, 'created_at'),
            updatedAt: Arr::get($data, 'updated_at'),
            clusterId: Arr::get($data, 'cluster_id'),
            expiresTimestamp: Arr::get($data, 'expires_timestamp'),
            emailContacts: Arr::get($data, 'email_contacts'),
            urlContacts: Arr::get($data, 'url_contacts'),
            encryptionKeyUrls: Arr::get($data, 'encryption_key_urls'),
            acknowledgmentUrls: Arr::get($data, 'acknowledgment_urls'),
            policyUrls: Arr::get($data, 'policy_urls'),
            openingUrls: Arr::get($data, 'opening_urls'),
            preferredLanguages: Arr::get($data, 'preferred_languages'),
        ))
            ->setIncludes(Arr::get($data, 'includes') !== null ? SecurityTXTPolicyIncludes::fromArray(Arr::get($data, 'includes')) : null);
    }
}
