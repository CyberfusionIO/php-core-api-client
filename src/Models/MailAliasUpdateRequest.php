<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Cyberfusion\CoreApi\Support\ValidationHelper;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class MailAliasUpdateRequest extends CoreApiModel implements CoreApiModelContract
{
    public function __construct()
    {
    }

    public function getForwardEmailAddresses(): array
    {
        return $this->getAttribute('forwardEmailAddresses');
    }

    /**
     * @throws ValidationException
     */
    public function setForwardEmailAddresses(array $forwardEmailAddresses): self
    {
        Validator::optional(Validator::create()
            ->unique())
            ->assert(ValidationHelper::prepareArray($forwardEmailAddresses));
        $this->setAttribute('forward_email_addresses', $forwardEmailAddresses);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
        ))
            ->setForwardEmailAddresses(Arr::get($data, 'forward_email_addresses'));
    }
}
