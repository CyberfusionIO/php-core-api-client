<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Enums\VirtualHostServerSoftwareNameEnum;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class VirtualHostsSearchRequest extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function getUnixUserId(): int|null
    {
        return $this->getAttribute('unix_user_id');
    }

    public function setUnixUserId(?int $unixUserId): self
    {
        $this->setAttribute('unix_user_id', $unixUserId);
        return $this;
    }

    public function getServerSoftwareName(): VirtualHostServerSoftwareNameEnum|null
    {
        return $this->getAttribute('server_software_name');
    }

    public function setServerSoftwareName(?VirtualHostServerSoftwareNameEnum $serverSoftwareName): self
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

    public function getDomain(): string|null
    {
        return $this->getAttribute('domain');
    }

    public function setDomain(?string $domain): self
    {
        $this->setAttribute('domain', $domain);
        return $this;
    }

    public function getServerAliases(): string|null
    {
        return $this->getAttribute('server_aliases');
    }

    public function setServerAliases(?string $serverAliases): self
    {
        $this->setAttribute('server_aliases', $serverAliases);
        return $this;
    }

    public function getDocumentRoot(): string|null
    {
        return $this->getAttribute('document_root');
    }

    public function setDocumentRoot(?string $documentRoot): self
    {
        $this->setAttribute('document_root', $documentRoot);
        return $this;
    }

    public function getFpmPoolId(): int|null
    {
        return $this->getAttribute('fpm_pool_id');
    }

    public function setFpmPoolId(?int $fpmPoolId): self
    {
        $this->setAttribute('fpm_pool_id', $fpmPoolId);
        return $this;
    }

    public function getPassengerAppId(): int|null
    {
        return $this->getAttribute('passenger_app_id');
    }

    public function setPassengerAppId(?int $passengerAppId): self
    {
        $this->setAttribute('passenger_app_id', $passengerAppId);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
        ))
            ->when(Arr::has($data, 'unix_user_id'), fn (self $model) => $model->setUnixUserId(Arr::get($data, 'unix_user_id')))
            ->when(Arr::has($data, 'server_software_name'), fn (self $model) => $model->setServerSoftwareName(Arr::get($data, 'server_software_name') !== null ? VirtualHostServerSoftwareNameEnum::tryFrom(Arr::get($data, 'server_software_name')) : null))
            ->when(Arr::has($data, 'cluster_id'), fn (self $model) => $model->setClusterId(Arr::get($data, 'cluster_id')))
            ->when(Arr::has($data, 'domain'), fn (self $model) => $model->setDomain(Arr::get($data, 'domain')))
            ->when(Arr::has($data, 'server_aliases'), fn (self $model) => $model->setServerAliases(Arr::get($data, 'server_aliases')))
            ->when(Arr::has($data, 'document_root'), fn (self $model) => $model->setDocumentRoot(Arr::get($data, 'document_root')))
            ->when(Arr::has($data, 'fpm_pool_id'), fn (self $model) => $model->setFpmPoolId(Arr::get($data, 'fpm_pool_id')))
            ->when(Arr::has($data, 'passenger_app_id'), fn (self $model) => $model->setPassengerAppId(Arr::get($data, 'passenger_app_id')));
    }
}
