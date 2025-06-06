<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class MailDomainUpdateRequest extends CoreApiModel implements CoreApiModelContract
{
    public function __construct()
    {
    }

    public function getCatchAllForwardEmailAddresses(): array|null
    {
        return $this->getAttribute('catch_all_forward_email_addresses');
    }

    public function setCatchAllForwardEmailAddresses(?array $catchAllForwardEmailAddresses): self
    {
        $this->setAttribute('catch_all_forward_email_addresses', $catchAllForwardEmailAddresses);
        return $this;
    }

    public function getIsLocal(): bool|null
    {
        return $this->getAttribute('is_local');
    }

    public function setIsLocal(?bool $isLocal): self
    {
        $this->setAttribute('is_local', $isLocal);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
        ))
            ->setCatchAllForwardEmailAddresses(Arr::get($data, 'catch_all_forward_email_addresses'))
            ->setIsLocal(Arr::get($data, 'is_local'));
    }
}
