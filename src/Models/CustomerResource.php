<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class CustomerResource extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function __construct(
        int $id,
        string $createdAt,
        string $updatedAt,
        string $identifier,
        string $dnsSubdomain,
        bool $isInternal,
        string $teamCode,
        CustomerIncludes $includes,
    ) {
        $this->setId($id);
        $this->setCreatedAt($createdAt);
        $this->setUpdatedAt($updatedAt);
        $this->setIdentifier($identifier);
        $this->setDnsSubdomain($dnsSubdomain);
        $this->setIsInternal($isInternal);
        $this->setTeamCode($teamCode);
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

    public function getIdentifier(): string
    {
        return $this->getAttribute('identifier');
    }

    /**
     * @throws ValidationException
     */
    public function setIdentifier(string $identifier): self
    {
        Validator::create()
            ->length(min: 2, max: 4)
            ->regex('/^[a-z0-9]+$/')
            ->assert($identifier);
        $this->setAttribute('identifier', $identifier);
        return $this;
    }

    public function getDnsSubdomain(): string
    {
        return $this->getAttribute('dns_subdomain');
    }

    public function setDnsSubdomain(string $dnsSubdomain): self
    {
        $this->setAttribute('dns_subdomain', $dnsSubdomain);
        return $this;
    }

    public function getIsInternal(): bool
    {
        return $this->getAttribute('is_internal');
    }

    public function setIsInternal(bool $isInternal): self
    {
        $this->setAttribute('is_internal', $isInternal);
        return $this;
    }

    public function getTeamCode(): string
    {
        return $this->getAttribute('team_code');
    }

    /**
     * @throws ValidationException
     */
    public function setTeamCode(string $teamCode): self
    {
        Validator::create()
            ->length(min: 4, max: 6)
            ->regex('/^[A-Z0-9]+$/')
            ->assert($teamCode);
        $this->setAttribute('team_code', $teamCode);
        return $this;
    }

    public function getIncludes(): CustomerIncludes
    {
        return $this->getAttribute('includes');
    }

    public function setIncludes(CustomerIncludes $includes): self
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
            identifier: Arr::get($data, 'identifier'),
            dnsSubdomain: Arr::get($data, 'dns_subdomain'),
            isInternal: Arr::get($data, 'is_internal'),
            teamCode: Arr::get($data, 'team_code'),
            includes: CustomerIncludes::fromArray(Arr::get($data, 'includes')),
        ));
    }
}
