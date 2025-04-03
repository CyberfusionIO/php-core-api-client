<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Cyberfusion\CoreApi\Support\ValidationHelper;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class SecurityTXTPolicyUpdateRequest extends CoreApiModel implements CoreApiModelContract
{
    public function __construct()
    {
    }

    public function getExpiresTimestamp(): string
    {
        return $this->getAttribute('expires_timestamp');
    }

    public function setExpiresTimestamp(string $expiresTimestamp): self
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
    public function setEmailContacts(array $emailContacts): self
    {
        Validator::optional(Validator::create()
            ->unique())
            ->assert(ValidationHelper::prepareArray($emailContacts));
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
    public function setUrlContacts(array $urlContacts): self
    {
        Validator::optional(Validator::create()
            ->unique())
            ->assert(ValidationHelper::prepareArray($urlContacts));
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
    public function setEncryptionKeyUrls(array $encryptionKeyUrls): self
    {
        Validator::optional(Validator::create()
            ->unique())
            ->assert(ValidationHelper::prepareArray($encryptionKeyUrls));
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
    public function setAcknowledgmentUrls(array $acknowledgmentUrls): self
    {
        Validator::optional(Validator::create()
            ->unique())
            ->assert(ValidationHelper::prepareArray($acknowledgmentUrls));
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
    public function setPolicyUrls(array $policyUrls): self
    {
        Validator::optional(Validator::create()
            ->unique())
            ->assert(ValidationHelper::prepareArray($policyUrls));
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
    public function setOpeningUrls(array $openingUrls): self
    {
        Validator::optional(Validator::create()
            ->unique())
            ->assert(ValidationHelper::prepareArray($openingUrls));
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
    public function setPreferredLanguages(array $preferredLanguages): self
    {
        Validator::optional(Validator::create()
            ->unique())
            ->assert(ValidationHelper::prepareArray($preferredLanguages));
        $this->setAttribute('preferred_languages', $preferredLanguages);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
        ))
            ->setExpiresTimestamp(Arr::get($data, 'expires_timestamp'))
            ->setEmailContacts(Arr::get($data, 'email_contacts'))
            ->setUrlContacts(Arr::get($data, 'url_contacts'))
            ->setEncryptionKeyUrls(Arr::get($data, 'encryption_key_urls'))
            ->setAcknowledgmentUrls(Arr::get($data, 'acknowledgment_urls'))
            ->setPolicyUrls(Arr::get($data, 'policy_urls'))
            ->setOpeningUrls(Arr::get($data, 'opening_urls'))
            ->setPreferredLanguages(Arr::get($data, 'preferred_languages'));
    }
}
