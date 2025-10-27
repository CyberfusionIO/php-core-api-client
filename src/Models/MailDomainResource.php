<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class MailDomainResource extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function __construct(
        int $id,
        string $createdAt,
        string $updatedAt,
        int $clusterId,
        string $domain,
        int $unixUserId,
        array $catchAllForwardEmailAddresses,
        bool $isLocal,
        MailDomainIncludes $includes,
    ) {
        $this->setId($id);
        $this->setCreatedAt($createdAt);
        $this->setUpdatedAt($updatedAt);
        $this->setClusterId($clusterId);
        $this->setDomain($domain);
        $this->setUnixUserId($unixUserId);
        $this->setCatchAllForwardEmailAddresses($catchAllForwardEmailAddresses);
        $this->setIsLocal($isLocal);
        $this->setIncludes($includes);
    }

    public function getId(): int
    {
        return $this->getAttribute('id');
    }

    public function setId(int $id): self
    {
        $this->setAttribute('id', $id);
        return $this;
    }

    public function getCreatedAt(): string
    {
        return $this->getAttribute('created_at');
    }

    public function setCreatedAt(string $createdAt): self
    {
        $this->setAttribute('created_at', $createdAt);
        return $this;
    }

    public function getUpdatedAt(): string
    {
        return $this->getAttribute('updated_at');
    }

    public function setUpdatedAt(string $updatedAt): self
    {
        $this->setAttribute('updated_at', $updatedAt);
        return $this;
    }

    public function getClusterId(): int
    {
        return $this->getAttribute('cluster_id');
    }

    public function setClusterId(int $clusterId): self
    {
        $this->setAttribute('cluster_id', $clusterId);
        return $this;
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
        Validator::create()
            ->unique()
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

    public function getIncludes(): MailDomainIncludes
    {
        return $this->getAttribute('includes');
    }

    public function setIncludes(MailDomainIncludes $includes): self
    {
        $this->setAttribute('includes', $includes);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            id: Arr::get($data, 'id'),
            createdAt: Arr::get($data, 'created_at'),
            updatedAt: Arr::get($data, 'updated_at'),
            clusterId: Arr::get($data, 'cluster_id'),
            domain: Arr::get($data, 'domain'),
            unixUserId: Arr::get($data, 'unix_user_id'),
            catchAllForwardEmailAddresses: Arr::get($data, 'catch_all_forward_email_addresses'),
            isLocal: Arr::get($data, 'is_local'),
            includes: MailDomainIncludes::fromArray(Arr::get($data, 'includes')),
        ));
    }
}
