<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class MailAliasCreateRequest extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function __construct(string $localPart, int $mailDomainId, array $forwardEmailAddresses)
    {
        $this->setLocalPart($localPart);
        $this->setMailDomainId($mailDomainId);
        $this->setForwardEmailAddresses($forwardEmailAddresses);
    }

    public function getLocalPart(): string
    {
        return $this->getAttribute('local_part');
    }

    /**
     * @throws ValidationException
     */
    public function setLocalPart(string $localPart): self
    {
        Validator::create()
            ->length(min: 1, max: 64)
            ->regex('/^[a-z0-9-.]+$/')
            ->assert($localPart);
        $this->setAttribute('local_part', $localPart);
        return $this;
    }

    public function getMailDomainId(): int
    {
        return $this->getAttribute('mail_domain_id');
    }

    public function setMailDomainId(int $mailDomainId): self
    {
        $this->setAttribute('mail_domain_id', $mailDomainId);
        return $this;
    }

    public function getForwardEmailAddresses(): array
    {
        return $this->getAttribute('forward_email_addresses');
    }

    /**
     * @throws ValidationException
     */
    public function setForwardEmailAddresses(array $forwardEmailAddresses): self
    {
        Validator::create()
            ->unique()
            ->assert($forwardEmailAddresses);
        $this->setAttribute('forward_email_addresses', $forwardEmailAddresses);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            localPart: Arr::get($data, 'local_part'),
            mailDomainId: Arr::get($data, 'mail_domain_id'),
            forwardEmailAddresses: Arr::get($data, 'forward_email_addresses'),
        ));
    }
}
