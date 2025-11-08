<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Enums\DatabaseServerSoftwareNameEnum;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class DatabaseUserResource extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function __construct(
        int $id,
        string $createdAt,
        string $updatedAt,
        string $name,
        DatabaseServerSoftwareNameEnum $serverSoftwareName,
        int $clusterId,
        DatabaseUserIncludes $includes,
        ?string $hashedPassword = null,
        ?string $host = null,
        ?array $phpmyadminFirewallGroupsIds = null,
    ) {
        $this->setId($id);
        $this->setCreatedAt($createdAt);
        $this->setUpdatedAt($updatedAt);
        $this->setName($name);
        $this->setServerSoftwareName($serverSoftwareName);
        $this->setClusterId($clusterId);
        $this->setIncludes($includes);
        $this->setHashedPassword($hashedPassword);
        $this->setHost($host);
        $this->setPhpmyadminFirewallGroupsIds($phpmyadminFirewallGroupsIds);
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

    public function getHashedPassword(): string|null
    {
        return $this->getAttribute('hashed_password');
    }

    public function setHashedPassword(?string $hashedPassword): self
    {
        $this->setAttribute('hashed_password', $hashedPassword);
        return $this;
    }

    public function getName(): string
    {
        return $this->getAttribute('name');
    }

    /**
     * @throws ValidationException
     */
    public function setName(string $name): self
    {
        Validator::create()
            ->length(min: 1, max: 63)
            ->regex('/^[a-z0-9-_]+$/')
            ->assert($name);
        $this->setAttribute('name', $name);
        return $this;
    }

    public function getServerSoftwareName(): DatabaseServerSoftwareNameEnum
    {
        return $this->getAttribute('server_software_name');
    }

    public function setServerSoftwareName(DatabaseServerSoftwareNameEnum $serverSoftwareName): self
    {
        $this->setAttribute('server_software_name', $serverSoftwareName);
        return $this;
    }

    public function getHost(): string|null
    {
        return $this->getAttribute('host');
    }

    public function setHost(?string $host): self
    {
        $this->setAttribute('host', $host);
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

    public function getPhpmyadminFirewallGroupsIds(): array|null
    {
        return $this->getAttribute('phpmyadmin_firewall_groups_ids');
    }

    public function setPhpmyadminFirewallGroupsIds(?array $phpmyadminFirewallGroupsIds): self
    {
        $this->setAttribute('phpmyadmin_firewall_groups_ids', $phpmyadminFirewallGroupsIds);
        return $this;
    }

    public function getIncludes(): DatabaseUserIncludes
    {
        return $this->getAttribute('includes');
    }

    public function setIncludes(DatabaseUserIncludes $includes): self
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
            name: Arr::get($data, 'name'),
            serverSoftwareName: DatabaseServerSoftwareNameEnum::tryFrom(Arr::get($data, 'server_software_name')),
            clusterId: Arr::get($data, 'cluster_id'),
            includes: DatabaseUserIncludes::fromArray(Arr::get($data, 'includes')),
            hashedPassword: Arr::get($data, 'hashed_password'),
            host: Arr::get($data, 'host'),
            phpmyadminFirewallGroupsIds: Arr::get($data, 'phpmyadmin_firewall_groups_ids'),
        ));
    }
}
