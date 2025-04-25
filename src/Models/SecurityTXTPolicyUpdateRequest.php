<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class SecurityTXTPolicyUpdateRequest extends CoreApiModel implements CoreApiModelContract
{
    public function __construct()
    {
    }

    public function getExpiresTimestamp(): string|null
    {
        return $this->getAttribute('expires_timestamp');
    }

    public function setExpiresTimestamp(?string $expiresTimestamp): self
    {
        $this->setAttribute('expires_timestamp', $expiresTimestamp);
        return $this;
    }

    public function getEmailContacts(): array|null
    {
        return $this->getAttribute('email_contacts');
    }

    public function setEmailContacts(?array $emailContacts): self
    {
        $this->setAttribute('email_contacts', $emailContacts);
        return $this;
    }

    public function getUrlContacts(): array|null
    {
        return $this->getAttribute('url_contacts');
    }

    public function setUrlContacts(?array $urlContacts): self
    {
        $this->setAttribute('url_contacts', $urlContacts);
        return $this;
    }

    public function getEncryptionKeyUrls(): array|null
    {
        return $this->getAttribute('encryption_key_urls');
    }

    public function setEncryptionKeyUrls(?array $encryptionKeyUrls): self
    {
        $this->setAttribute('encryption_key_urls', $encryptionKeyUrls);
        return $this;
    }

    public function getAcknowledgmentUrls(): array|null
    {
        return $this->getAttribute('acknowledgment_urls');
    }

    public function setAcknowledgmentUrls(?array $acknowledgmentUrls): self
    {
        $this->setAttribute('acknowledgment_urls', $acknowledgmentUrls);
        return $this;
    }

    public function getPolicyUrls(): array|null
    {
        return $this->getAttribute('policy_urls');
    }

    public function setPolicyUrls(?array $policyUrls): self
    {
        $this->setAttribute('policy_urls', $policyUrls);
        return $this;
    }

    public function getOpeningUrls(): array|null
    {
        return $this->getAttribute('opening_urls');
    }

    public function setOpeningUrls(?array $openingUrls): self
    {
        $this->setAttribute('opening_urls', $openingUrls);
        return $this;
    }

    public function getPreferredLanguages(): array|null
    {
        return $this->getAttribute('preferred_languages');
    }

    public function setPreferredLanguages(?array $preferredLanguages): self
    {
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
