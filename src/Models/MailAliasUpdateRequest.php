<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class MailAliasUpdateRequest extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function getForwardEmailAddresses(): array|null
    {
        return $this->getAttribute('forward_email_addresses');
    }

    public function setForwardEmailAddresses(?array $forwardEmailAddresses): self
    {
        $this->setAttribute('forward_email_addresses', $forwardEmailAddresses);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
        ))
            ->when(Arr::has($data, 'forward_email_addresses'), fn (self $model) => $model->setForwardEmailAddresses(Arr::get($data, 'forward_email_addresses')));
    }
}
