<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Enums\DatabaseServerSoftwareNameEnum;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class DatabaseUsersSearchRequest extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function getPhpmyadminFirewallGroupId(): int|null
    {
        return $this->getAttribute('phpmyadmin_firewall_group_id');
    }

    public function setPhpmyadminFirewallGroupId(?int $phpmyadminFirewallGroupId): self
    {
        $this->setAttribute('phpmyadmin_firewall_group_id', $phpmyadminFirewallGroupId);
        return $this;
    }

    public function getName(): string|null
    {
        return $this->getAttribute('name');
    }

    public function setName(?string $name): self
    {
        $this->setAttribute('name', $name);
        return $this;
    }

    public function getServerSoftwareName(): DatabaseServerSoftwareNameEnum|null
    {
        return $this->getAttribute('server_software_name');
    }

    public function setServerSoftwareName(?DatabaseServerSoftwareNameEnum $serverSoftwareName): self
    {
        $this->setAttribute('server_software_name', $serverSoftwareName);
        return $this;
    }

    public function getClusterId(): int|null
    {
        return $this->getAttribute('cluster_id');
    }

    public function setClusterId(?int $clusterId): self
    {
        $this->setAttribute('cluster_id', $clusterId);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
        ))
            ->when(Arr::has($data, 'phpmyadmin_firewall_group_id'), fn (self $model) => $model->setPhpmyadminFirewallGroupId(Arr::get($data, 'phpmyadmin_firewall_group_id')))
            ->when(Arr::has($data, 'name'), fn (self $model) => $model->setName(Arr::get($data, 'name')))
            ->when(Arr::has($data, 'server_software_name'), fn (self $model) => $model->setServerSoftwareName(Arr::get($data, 'server_software_name') !== null ? DatabaseServerSoftwareNameEnum::tryFrom(Arr::get($data, 'server_software_name')) : null))
            ->when(Arr::has($data, 'cluster_id'), fn (self $model) => $model->setClusterId(Arr::get($data, 'cluster_id')));
    }
}
