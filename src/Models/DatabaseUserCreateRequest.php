<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Enums\DatabaseServerSoftwareNameEnum;
use Cyberfusion\CoreApi\Enums\HostEnum;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class DatabaseUserCreateRequest extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(
        string $password,
        string $name,
        DatabaseServerSoftwareNameEnum $serverSoftwareName,
        int $clusterId,
        ?HostEnum $host = null,
        ?array $phpmyadminFirewallGroupsIds = null,
    ) {
        $this->setPassword($password);
        $this->setName($name);
        $this->setServerSoftwareName($serverSoftwareName);
        $this->setClusterId($clusterId);
        $this->setHost($host);
        $this->setPhpmyadminFirewallGroupsIds($phpmyadminFirewallGroupsIds);
    }

    public function getPassword(): string
    {
        return $this->getAttribute('password');
    }

    /**
     * @throws ValidationException
     */
    public function setPassword(?string $password = null): self
    {
        Validator::create()
            ->length(min: 24, max: 255)
            ->regex('/^[ -~]+$/')
            ->assert($password);
        $this->setAttribute('password', $password);
        return $this;
    }

    public function getName(): string
    {
        return $this->getAttribute('name');
    }

    /**
     * @throws ValidationException
     */
    public function setName(?string $name = null): self
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
        return $this->getAttribute('serverSoftwareName');
    }

    public function setServerSoftwareName(?DatabaseServerSoftwareNameEnum $serverSoftwareName = null): self
    {
        $this->setAttribute('server_software_name', $serverSoftwareName);
        return $this;
    }

    public function getHost(): HostEnum|null
    {
        return $this->getAttribute('host');
    }

    public function setHost(?HostEnum $host = null): self
    {
        $this->setAttribute('host', $host);
        return $this;
    }

    public function getClusterId(): int
    {
        return $this->getAttribute('clusterId');
    }

    public function setClusterId(?int $clusterId = null): self
    {
        $this->setAttribute('cluster_id', $clusterId);
        return $this;
    }

    public function getPhpmyadminFirewallGroupsIds(): array|null
    {
        return $this->getAttribute('phpmyadminFirewallGroupsIds');
    }

    public function setPhpmyadminFirewallGroupsIds(?array $phpmyadminFirewallGroupsIds = []): self
    {
        $this->setAttribute('phpmyadmin_firewall_groups_ids', $phpmyadminFirewallGroupsIds);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            password: Arr::get($data, 'password'),
            name: Arr::get($data, 'name'),
            serverSoftwareName: DatabaseServerSoftwareNameEnum::tryFrom(Arr::get($data, 'server_software_name')),
            clusterId: Arr::get($data, 'cluster_id'),
            host: Arr::get($data, 'host') !== null ? HostEnum::tryFrom(Arr::get($data, 'host')) : null,
            phpmyadminFirewallGroupsIds: Arr::get($data, 'phpmyadmin_firewall_groups_ids'),
        ));
    }
}
