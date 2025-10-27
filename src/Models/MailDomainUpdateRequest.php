<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class MailDomainUpdateRequest extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

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
            ->when(Arr::has($data, 'catch_all_forward_email_addresses'), fn (self $model) => $model->setCatchAllForwardEmailAddresses(Arr::get($data, 'catch_all_forward_email_addresses')))
            ->when(Arr::has($data, 'is_local'), fn (self $model) => $model->setIsLocal(Arr::get($data, 'is_local')));
    }
}
