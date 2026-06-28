<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class PhpVersionResource extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function __construct(
        int $id,
        string $createdAt,
        string $updatedAt,
        string $version,
        string $securitySupportEndsAt,
        PhpVersionIncludes $includes,
    ) {
        $this->setId($id);
        $this->setCreatedAt($createdAt);
        $this->setUpdatedAt($updatedAt);
        $this->setVersion($version);
        $this->setSecuritySupportEndsAt($securitySupportEndsAt);
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

    public function getVersion(): string
    {
        return $this->getAttribute('version');
    }

    public function setVersion(string $version): self
    {
        $this->setAttribute('version', $version);
        return $this;
    }

    public function getSecuritySupportEndsAt(): string
    {
        return $this->getAttribute('security_support_ends_at');
    }

    public function setSecuritySupportEndsAt(string $securitySupportEndsAt): self
    {
        $this->setAttribute('security_support_ends_at', $securitySupportEndsAt);
        return $this;
    }

    public function getIncludes(): PhpVersionIncludes
    {
        return $this->getAttribute('includes');
    }

    public function setIncludes(PhpVersionIncludes $includes): self
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
            version: Arr::get($data, 'version'),
            securitySupportEndsAt: Arr::get($data, 'security_support_ends_at'),
            includes: PhpVersionIncludes::fromArray(Arr::get($data, 'includes')),
        ));
    }
}
