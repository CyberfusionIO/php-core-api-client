<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Cyberfusion\CoreApi\Support\ValidationHelper;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class MailDomainCreateRequest extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(
        string $domain,
        int $unixUserId,
        bool $isLocal,
        ?array $catchAllForwardEmailAddresses = null,
    ) {
        $this->setDomain($domain);
        $this->setUnixUserId($unixUserId);
        $this->setIsLocal($isLocal);
        $this->setCatchAllForwardEmailAddresses($catchAllForwardEmailAddresses);
    }

    public function getDomain(): string
    {
        return $this->getAttribute('domain');
    }

    public function setDomain(?string $domain = null): self
    {
        $this->setAttribute('domain', $domain);
        return $this;
    }

    public function getUnixUserId(): int
    {
        return $this->getAttribute('unixUserId');
    }

    public function setUnixUserId(?int $unixUserId = null): self
    {
        $this->setAttribute('unixUserId', $unixUserId);
        return $this;
    }

    public function getCatchAllForwardEmailAddresses(): array|null
    {
        return $this->getAttribute('catchAllForwardEmailAddresses');
    }

    /**
     * @throws ValidationException
     */
    public function setCatchAllForwardEmailAddresses(?array $catchAllForwardEmailAddresses = []): self
    {
        Validator::create()
            ->unique()
            ->assert(ValidationHelper::prepareArray($catchAllForwardEmailAddresses));
        $this->setAttribute('catchAllForwardEmailAddresses', $catchAllForwardEmailAddresses);
        return $this;
    }

    public function getIsLocal(): bool
    {
        return $this->getAttribute('isLocal');
    }

    public function setIsLocal(?bool $isLocal = null): self
    {
        $this->setAttribute('isLocal', $isLocal);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            domain: Arr::get($data, 'domain'),
            unixUserId: Arr::get($data, 'unix_user_id'),
            isLocal: Arr::get($data, 'is_local'),
            catchAllForwardEmailAddresses: Arr::get($data, 'catch_all_forward_email_addresses'),
        ));
    }
}
