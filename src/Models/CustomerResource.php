<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class CustomerResource extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(
        int $id,
        string $createdAt,
        string $updatedAt,
        string $identifier,
        string $dnsSubdomain,
        bool $isInternal,
        string $teamCode,
    ) {
        $this->setId($id);
        $this->setCreatedAt($createdAt);
        $this->setUpdatedAt($updatedAt);
        $this->setIdentifier($identifier);
        $this->setDnsSubdomain($dnsSubdomain);
        $this->setIsInternal($isInternal);
        $this->setTeamCode($teamCode);
    }

    public function getId(): int
    {
        return $this->getAttribute('id');
    }

    public function setId(?int $id = null): self
    {
        $this->setAttribute('id', $id);
        return $this;
    }

    public function getCreatedAt(): string
    {
        return $this->getAttribute('createdAt');
    }

    public function setCreatedAt(?string $createdAt = null): self
    {
        $this->setAttribute('createdAt', $createdAt);
        return $this;
    }

    public function getUpdatedAt(): string
    {
        return $this->getAttribute('updatedAt');
    }

    public function setUpdatedAt(?string $updatedAt = null): self
    {
        $this->setAttribute('updatedAt', $updatedAt);
        return $this;
    }

    public function getIdentifier(): string
    {
        return $this->getAttribute('identifier');
    }

    /**
     * @throws ValidationException
     */
    public function setIdentifier(?string $identifier = null): self
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
        return $this->getAttribute('dnsSubdomain');
    }

    public function setDnsSubdomain(?string $dnsSubdomain = null): self
    {
        $this->setAttribute('dnsSubdomain', $dnsSubdomain);
        return $this;
    }

    public function getIsInternal(): bool
    {
        return $this->getAttribute('isInternal');
    }

    public function setIsInternal(?bool $isInternal = null): self
    {
        $this->setAttribute('isInternal', $isInternal);
        return $this;
    }

    public function getTeamCode(): string
    {
        return $this->getAttribute('teamCode');
    }

    /**
     * @throws ValidationException
     */
    public function setTeamCode(?string $teamCode = null): self
    {
        Validator::create()
            ->length(min: 4, max: 6)
            ->regex('/^[A-Z0-9]+$/')
            ->assert($teamCode);
        $this->setAttribute('teamCode', $teamCode);
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
        ));
    }
}
