<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class SecurityTXTPolicyUpdateRequest extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

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
            ->when(Arr::has($data, 'expires_timestamp'), fn (self $model) => $model->setExpiresTimestamp(Arr::get($data, 'expires_timestamp')))
            ->when(Arr::has($data, 'email_contacts'), fn (self $model) => $model->setEmailContacts(Arr::get($data, 'email_contacts')))
            ->when(Arr::has($data, 'url_contacts'), fn (self $model) => $model->setUrlContacts(Arr::get($data, 'url_contacts')))
            ->when(Arr::has($data, 'encryption_key_urls'), fn (self $model) => $model->setEncryptionKeyUrls(Arr::get($data, 'encryption_key_urls')))
            ->when(Arr::has($data, 'acknowledgment_urls'), fn (self $model) => $model->setAcknowledgmentUrls(Arr::get($data, 'acknowledgment_urls')))
            ->when(Arr::has($data, 'policy_urls'), fn (self $model) => $model->setPolicyUrls(Arr::get($data, 'policy_urls')))
            ->when(Arr::has($data, 'opening_urls'), fn (self $model) => $model->setOpeningUrls(Arr::get($data, 'opening_urls')))
            ->when(Arr::has($data, 'preferred_languages'), fn (self $model) => $model->setPreferredLanguages(Arr::get($data, 'preferred_languages')));
    }
}
