<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class SecurityTxtPolicyCreateRequest extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function __construct(int $clusterId, string $expiresTimestamp, array $emailContacts, array $urlContacts)
    {
        $this->setClusterId($clusterId);
        $this->setExpiresTimestamp($expiresTimestamp);
        $this->setEmailContacts($emailContacts);
        $this->setUrlContacts($urlContacts);
    }

    public function getClusterId(): int
    {
        return $this->getAttribute('cluster_id');
    }

    public function setClusterId(int $clusterId): self
    {
        $this->setAttribute('cluster_id', $clusterId);
        return $this;
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
    public function setUrlContacts(array $urlContacts): self
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
    public function setEncryptionKeyUrls(array $encryptionKeyUrls): self
    {
        Validator::optional(Validator::create()
            ->unique())
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
    public function setAcknowledgmentUrls(array $acknowledgmentUrls): self
    {
        Validator::optional(Validator::create()
            ->unique())
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
    public function setPolicyUrls(array $policyUrls): self
    {
        Validator::optional(Validator::create()
            ->unique())
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
    public function setOpeningUrls(array $openingUrls): self
    {
        Validator::optional(Validator::create()
            ->unique())
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
    public function setPreferredLanguages(array $preferredLanguages): self
    {
        Validator::optional(Validator::create()
            ->unique())
            ->assert($preferredLanguages);
        $this->setAttribute('preferred_languages', $preferredLanguages);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            clusterId: Arr::get($data, 'cluster_id'),
            expiresTimestamp: Arr::get($data, 'expires_timestamp'),
            emailContacts: Arr::get($data, 'email_contacts'),
            urlContacts: Arr::get($data, 'url_contacts'),
        ))
            ->when(Arr::has($data, 'encryption_key_urls'), fn (self $model) => $model->setEncryptionKeyUrls(Arr::get($data, 'encryption_key_urls', [])))
            ->when(Arr::has($data, 'acknowledgment_urls'), fn (self $model) => $model->setAcknowledgmentUrls(Arr::get($data, 'acknowledgment_urls', [])))
            ->when(Arr::has($data, 'policy_urls'), fn (self $model) => $model->setPolicyUrls(Arr::get($data, 'policy_urls', [])))
            ->when(Arr::has($data, 'opening_urls'), fn (self $model) => $model->setOpeningUrls(Arr::get($data, 'opening_urls', [])))
            ->when(Arr::has($data, 'preferred_languages'), fn (self $model) => $model->setPreferredLanguages(Arr::get($data, 'preferred_languages', [])));
    }
}
