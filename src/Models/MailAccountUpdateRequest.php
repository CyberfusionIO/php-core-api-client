<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class MailAccountUpdateRequest extends CoreApiModel implements CoreApiModelContract
{
    public function __construct()
    {
    }

    public function getPassword(): string
    {
        return $this->getAttribute('password');
    }

    /**
     * @throws ValidationException
     */
    public function setPassword(string $password): self
    {
        Validator::optional(Validator::create()
            ->length(min: 6, max: 255)
            ->regex('/^[ -~]+$/'))
            ->assert($password);
        $this->setAttribute('password', $password);
        return $this;
    }

    public function getQuota(): int|null
    {
        return $this->getAttribute('quota');
    }

    public function setQuota(?int $quota): self
    {
        $this->setAttribute('quota', $quota);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
        ))
            ->setPassword(Arr::get($data, 'password'))
            ->setQuota(Arr::get($data, 'quota'));
    }
}
