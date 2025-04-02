<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Cyberfusion\CoreApi\Support\ValidationHelper;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class SecurityTXTPolicyCreateRequest extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(
        int $clusterId,
        string $expiresTimestamp,
        ?array $encryptionKeyUrls = null,
        ?array $acknowledgmentUrls = null,
        ?array $policyUrls = null,
        ?array $openingUrls = null,
        ?array $preferredLanguages = null,
    ) {
        $this->setClusterId($clusterId);
        $this->setExpiresTimestamp($expiresTimestamp);
        $this->setEncryptionKeyUrls($encryptionKeyUrls);
        $this->setAcknowledgmentUrls($acknowledgmentUrls);
        $this->setPolicyUrls($policyUrls);
        $this->setOpeningUrls($openingUrls);
        $this->setPreferredLanguages($preferredLanguages);
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
    public function setEmailContacts(?array $emailContacts): self
    {
        Validator::optional(Validator::create()
            ->unique())
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
    public function setUrlContacts(?array $urlContacts): self
    {
        Validator::optional(Validator::create()
            ->unique())
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
