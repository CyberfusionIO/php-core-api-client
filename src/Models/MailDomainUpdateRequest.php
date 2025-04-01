<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Cyberfusion\CoreApi\Support\ValidationHelper;
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
        return $this->getAttribute('catchAllForwardEmailAddresses');
    }

    /**
     * @throws ValidationException
     */
    public function setCatchAllForwardEmailAddresses(?array $catchAllForwardEmailAddresses): self
    {
        Validator::optional(Validator::create()
            ->unique())
            ->assert(ValidationHelper::prepareArray($catchAllForwardEmailAddresses));
        $this->setAttribute('catchAllForwardEmailAddresses', $catchAllForwardEmailAddresses);
        return $this;
    }

    public function getIsLocal(): bool
    {
        return $this->getAttribute('isLocal');
    }

    public function setIsLocal(bool $isLocal): self
    {
        $this->setAttribute('isLocal', $isLocal);
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
