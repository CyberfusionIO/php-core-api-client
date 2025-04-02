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
class SecurityTXTPolicyDatabase extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(
        int $id,
        string $createdAt,
        string $updatedAt,
        int $clusterId,
        string $expiresTimestamp,
        ?array $emailContacts = null,
        ?array $urlContacts = null,
        ?array $encryptionKeyUrls = null,
        ?array $acknowledgmentUrls = null,
        ?array $policyUrls = null,
        ?array $openingUrls = null,
        ?array $preferredLanguages = null,
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

    public function getExpiresTimestamp(): string
    {
        return $this->getAttribute('expiresTimestamp');
    }

    public function setExpiresTimestamp(?string $expiresTimestamp = null): self
    {
        $this->setAttribute('expires_timestamp', $expiresTimestamp);
        return $this;
    }

    public function getEmailContacts(): array|null
    {
        return $this->getAttribute('emailContacts');
    }

    /**
     * @throws ValidationException
     */
    public function setEmailContacts(?array $emailContacts = []): self
    {
        Validator::create()
            ->unique()
            ->assert(ValidationHelper::prepareArray($emailContacts));
        $this->setAttribute('email_contacts', $emailContacts);
        return $this;
    }

    public function getUrlContacts(): array|null
    {
        return $this->getAttribute('urlContacts');
    }

    /**
     * @throws ValidationException
     */
    public function setUrlContacts(?array $urlContacts = []): self
    {
        Validator::create()
            ->unique()
            ->assert(ValidationHelper::prepareArray($urlContacts));
        $this->setAttribute('url_contacts', $urlContacts);
        return $this;
    }

    public function getEncryptionKeyUrls(): array|null
    {
        return $this->getAttribute('encryptionKeyUrls');
    }

    /**
     * @throws ValidationException
     */
    public function setEncryptionKeyUrls(?array $encryptionKeyUrls = []): self
    {
        Validator::create()
            ->unique()
            ->assert(ValidationHelper::prepareArray($encryptionKeyUrls));
        $this->setAttribute('encryption_key_urls', $encryptionKeyUrls);
        return $this;
    }

    public function getAcknowledgmentUrls(): array|null
    {
        return $this->getAttribute('acknowledgmentUrls');
    }

    /**
     * @throws ValidationException
     */
    public function setAcknowledgmentUrls(?array $acknowledgmentUrls = []): self
    {
        Validator::create()
            ->unique()
            ->assert(ValidationHelper::prepareArray($acknowledgmentUrls));
        $this->setAttribute('acknowledgment_urls', $acknowledgmentUrls);
        return $this;
    }

    public function getPolicyUrls(): array|null
    {
        return $this->getAttribute('policyUrls');
    }

    /**
     * @throws ValidationException
     */
    public function setPolicyUrls(?array $policyUrls = []): self
    {
        Validator::create()
            ->unique()
            ->assert(ValidationHelper::prepareArray($policyUrls));
        $this->setAttribute('policy_urls', $policyUrls);
        return $this;
    }

    public function getOpeningUrls(): array|null
    {
        return $this->getAttribute('openingUrls');
    }

    /**
     * @throws ValidationException
     */
    public function setOpeningUrls(?array $openingUrls = []): self
    {
        Validator::create()
            ->unique()
            ->assert(ValidationHelper::prepareArray($openingUrls));
        $this->setAttribute('opening_urls', $openingUrls);
        return $this;
    }

    public function getPreferredLanguages(): array|null
    {
        return $this->getAttribute('preferredLanguages');
    }

    /**
     * @throws ValidationException
     */
    public function setPreferredLanguages(?array $preferredLanguages = []): self
    {
        Validator::create()
            ->unique()
            ->assert(ValidationHelper::prepareArray($preferredLanguages));
        $this->setAttribute('preferred_languages', $preferredLanguages);
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
        ));
    }
}
