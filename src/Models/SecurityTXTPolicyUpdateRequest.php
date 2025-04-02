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
        return $this->getAttribute('expiresTimestamp');
    }

    public function setExpiresTimestamp(string $expiresTimestamp): self
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
    public function setEncryptionKeyUrls(?array $encryptionKeyUrls): self
    {
        Validator::optional(Validator::create()
            ->unique())
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
    public function setAcknowledgmentUrls(?array $acknowledgmentUrls): self
    {
        Validator::optional(Validator::create()
            ->unique())
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
    public function setPolicyUrls(?array $policyUrls): self
    {
        Validator::optional(Validator::create()
            ->unique())
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
    public function setOpeningUrls(?array $openingUrls): self
    {
        Validator::optional(Validator::create()
            ->unique())
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
    public function setPreferredLanguages(?array $preferredLanguages): self
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
