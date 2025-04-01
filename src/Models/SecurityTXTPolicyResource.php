<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Cyberfusion\CoreApi\Support\ValidationHelper;
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
        $this->setAttribute('createdAt', $createdAt);
        return $this;
    }

    public function getUpdatedAt(): string
    {
        return $this->getAttribute('updatedAt');
    }

    public function setUpdatedAt(?string $updatedAt = null): self
    {
        $this->setAttribute('updatedAt', $updatedAt);
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

    public function getExpiresTimestamp(): string
    {
        return $this->getAttribute('expiresTimestamp');
    }

    public function setExpiresTimestamp(?string $expiresTimestamp = null): self
    {
        $this->setAttribute('expiresTimestamp', $expiresTimestamp);
        return $this;
    }

    public function getEmailContacts(): array|null
    {
        return $this->getAttribute('emailContacts');
    }

    /**
     * @throws ValidationException
     */
    public function setEmailContacts(?array $emailContacts): self
    {
        Validator::optional(Validator::create()
            ->unique())
            ->assert(ValidationHelper::prepareArray($emailContacts));
        $this->setAttribute('emailContacts', $emailContacts);
        return $this;
    }

    public function getUrlContacts(): array|null
    {
        return $this->getAttribute('urlContacts');
    }

    /**
     * @throws ValidationException
     */
    public function setUrlContacts(?array $urlContacts): self
    {
        Validator::optional(Validator::create()
            ->unique())
            ->assert(ValidationHelper::prepareArray($urlContacts));
        $this->setAttribute('urlContacts', $urlContacts);
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
        $this->setAttribute('encryptionKeyUrls', $encryptionKeyUrls);
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
        $this->setAttribute('acknowledgmentUrls', $acknowledgmentUrls);
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
        $this->setAttribute('policyUrls', $policyUrls);
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
        $this->setAttribute('openingUrls', $openingUrls);
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
        $this->setAttribute('preferredLanguages', $preferredLanguages);
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
            encryptionKeyUrls: Arr::get($data, 'encryption_key_urls'),
            acknowledgmentUrls: Arr::get($data, 'acknowledgment_urls'),
            policyUrls: Arr::get($data, 'policy_urls'),
            openingUrls: Arr::get($data, 'opening_urls'),
            preferredLanguages: Arr::get($data, 'preferred_languages'),
        ))
            ->setEmailContacts(Arr::get($data, 'email_contacts'))
            ->setUrlContacts(Arr::get($data, 'url_contacts'));
    }
}
