<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class MailAccountResource extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function __construct(
        int $id,
        string $createdAt,
        string $updatedAt,
        string $hashedPassword,
        string $localPart,
        int $mailDomainId,
        int $clusterId,
        MailAccountIncludes $includes,
        ?int $quota = null,
    ) {
        $this->setId($id);
        $this->setCreatedAt($createdAt);
        $this->setUpdatedAt($updatedAt);
        $this->setHashedPassword($hashedPassword);
        $this->setLocalPart($localPart);
        $this->setMailDomainId($mailDomainId);
        $this->setClusterId($clusterId);
        $this->setIncludes($includes);
        $this->setQuota($quota);
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

    public function getHashedPassword(): string
    {
        return $this->getAttribute('hashed_password');
    }

    /**
     * @throws ValidationException
     */
    public function setHashedPassword(string $hashedPassword): self
    {
        Validator::create()
            ->length(min: 1, max: 255)
            ->regex('/^[ -~]+$/')
            ->assert($hashedPassword);
        $this->setAttribute('hashed_password', $hashedPassword);
        return $this;
    }

    public function getLocalPart(): string
    {
        return $this->getAttribute('local_part');
    }

    /**
     * @throws ValidationException
     */
    public function setLocalPart(string $localPart): self
    {
        Validator::create()
            ->length(min: 1, max: 64)
            ->regex('/^[a-z0-9-.]+$/')
            ->assert($localPart);
        $this->setAttribute('local_part', $localPart);
        return $this;
    }

    public function getMailDomainId(): int
    {
        return $this->getAttribute('mail_domain_id');
    }

    public function setMailDomainId(int $mailDomainId): self
    {
        $this->setAttribute('mail_domain_id', $mailDomainId);
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

    public function getQuota(): int|null
    {
        return $this->getAttribute('quota');
    }

    public function setQuota(?int $quota): self
    {
        $this->setAttribute('quota', $quota);
        return $this;
    }

    public function getIncludes(): MailAccountIncludes
    {
        return $this->getAttribute('includes');
    }

    public function setIncludes(MailAccountIncludes $includes): self
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
            hashedPassword: Arr::get($data, 'hashed_password'),
            localPart: Arr::get($data, 'local_part'),
            mailDomainId: Arr::get($data, 'mail_domain_id'),
            clusterId: Arr::get($data, 'cluster_id'),
            includes: MailAccountIncludes::fromArray(Arr::get($data, 'includes')),
            quota: Arr::get($data, 'quota'),
        ));
    }
}
