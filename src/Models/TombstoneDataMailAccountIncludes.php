<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class TombstoneDataMailAccountIncludes extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function __construct(MailDomainResource|TombstoneDataMailDomain $mailDomain)
    {
        $this->setMailDomain($mailDomain);
    }

    public function getMailDomain(): MailDomainResource|TombstoneDataMailDomain
    {
        return $this->getAttribute('mail_domain');
    }

    public function setMailDomain(MailDomainResource|TombstoneDataMailDomain $mailDomain): self
    {
        $this->setAttribute('mail_domain', $mailDomain);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            mailDomain: MailDomainResource::fromArray(Arr::get($data, 'mail_domain')),
        ));
    }
}
