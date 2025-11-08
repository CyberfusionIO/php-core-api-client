<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class MailDomainCreateRequest extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function __construct(string $domain, int $unixUserId)
    {
        $this->setDomain($domain);
        $this->setUnixUserId($unixUserId);
    }

    public function getDomain(): string
    {
        return $this->getAttribute('domain');
    }

    public function setDomain(string $domain): self
    {
        $this->setAttribute('domain', $domain);
        return $this;
    }

    public function getUnixUserId(): int
    {
        return $this->getAttribute('unix_user_id');
    }

    public function setUnixUserId(int $unixUserId): self
    {
        $this->setAttribute('unix_user_id', $unixUserId);
        return $this;
    }

    public function getCatchAllForwardEmailAddresses(): array
    {
        return $this->getAttribute('catch_all_forward_email_addresses');
    }

    /**
     * @throws ValidationException
     */
    public function setCatchAllForwardEmailAddresses(array $catchAllForwardEmailAddresses): self
    {
        Validator::optional(Validator::create()
            ->unique())
            ->assert($catchAllForwardEmailAddresses);
        $this->setAttribute('catch_all_forward_email_addresses', $catchAllForwardEmailAddresses);
        return $this;
    }

    public function getIsLocal(): bool
    {
        return $this->getAttribute('is_local');
    }

    public function setIsLocal(bool $isLocal): self
    {
        $this->setAttribute('is_local', $isLocal);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            domain: Arr::get($data, 'domain'),
            unixUserId: Arr::get($data, 'unix_user_id'),
        ))
            ->when(Arr::has($data, 'catch_all_forward_email_addresses'), fn (self $model) => $model->setCatchAllForwardEmailAddresses(Arr::get($data, 'catch_all_forward_email_addresses', [])))
            ->when(Arr::has($data, 'is_local'), fn (self $model) => $model->setIsLocal(Arr::get($data, 'is_local', true)));
    }
}
