<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Enums\LanguageCodeEnum;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class SecurityTxtPoliciesSearchRequest extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function getClusterId(): int|null
    {
        return $this->getAttribute('cluster_id');
    }

    public function setClusterId(?int $clusterId): self
    {
        $this->setAttribute('cluster_id', $clusterId);
        return $this;
    }

    public function getEmailContacts(): string|null
    {
        return $this->getAttribute('email_contacts');
    }

    public function setEmailContacts(?string $emailContacts): self
    {
        $this->setAttribute('email_contacts', $emailContacts);
        return $this;
    }

    public function getUrlContacts(): string|null
    {
        return $this->getAttribute('url_contacts');
    }

    public function setUrlContacts(?string $urlContacts): self
    {
        $this->setAttribute('url_contacts', $urlContacts);
        return $this;
    }

    public function getEncryptionKeyUrls(): string|null
    {
        return $this->getAttribute('encryption_key_urls');
    }

    public function setEncryptionKeyUrls(?string $encryptionKeyUrls): self
    {
        $this->setAttribute('encryption_key_urls', $encryptionKeyUrls);
        return $this;
    }

    public function getAcknowledgmentUrls(): string|null
    {
        return $this->getAttribute('acknowledgment_urls');
    }

    public function setAcknowledgmentUrls(?string $acknowledgmentUrls): self
    {
        $this->setAttribute('acknowledgment_urls', $acknowledgmentUrls);
        return $this;
    }

    public function getPolicyUrls(): string|null
    {
        return $this->getAttribute('policy_urls');
    }

    public function setPolicyUrls(?string $policyUrls): self
    {
        $this->setAttribute('policy_urls', $policyUrls);
        return $this;
    }

    public function getOpeningUrls(): string|null
    {
        return $this->getAttribute('opening_urls');
    }

    public function setOpeningUrls(?string $openingUrls): self
    {
        $this->setAttribute('opening_urls', $openingUrls);
        return $this;
    }

    public function getPreferredLanguages(): LanguageCodeEnum|null
    {
        return $this->getAttribute('preferred_languages');
    }

    public function setPreferredLanguages(?LanguageCodeEnum $preferredLanguages): self
    {
        $this->setAttribute('preferred_languages', $preferredLanguages);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
        ))
            ->when(Arr::has($data, 'cluster_id'), fn (self $model) => $model->setClusterId(Arr::get($data, 'cluster_id')))
            ->when(Arr::has($data, 'email_contacts'), fn (self $model) => $model->setEmailContacts(Arr::get($data, 'email_contacts')))
            ->when(Arr::has($data, 'url_contacts'), fn (self $model) => $model->setUrlContacts(Arr::get($data, 'url_contacts')))
            ->when(Arr::has($data, 'encryption_key_urls'), fn (self $model) => $model->setEncryptionKeyUrls(Arr::get($data, 'encryption_key_urls')))
            ->when(Arr::has($data, 'acknowledgment_urls'), fn (self $model) => $model->setAcknowledgmentUrls(Arr::get($data, 'acknowledgment_urls')))
            ->when(Arr::has($data, 'policy_urls'), fn (self $model) => $model->setPolicyUrls(Arr::get($data, 'policy_urls')))
            ->when(Arr::has($data, 'opening_urls'), fn (self $model) => $model->setOpeningUrls(Arr::get($data, 'opening_urls')))
            ->when(Arr::has($data, 'preferred_languages'), fn (self $model) => $model->setPreferredLanguages(Arr::get($data, 'preferred_languages') !== null ? LanguageCodeEnum::tryFrom(Arr::get($data, 'preferred_languages')) : null));
    }
}
