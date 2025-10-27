<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Enums\VirtualHostServerSoftwareNameEnum;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class VirtualHostUpdateRequest extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function getServerAliases(): array|null
    {
        return $this->getAttribute('server_aliases');
    }

    public function setServerAliases(?array $serverAliases): self
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

    public function getCustomConfig(): string|null
    {
        return $this->getAttribute('custom_config');
    }

    public function setCustomConfig(?string $customConfig): self
    {
        $this->setAttribute('custom_config', $customConfig);
        return $this;
    }

    public function getAllowOverrideDirectives(): array|null
    {
        return $this->getAttribute('allow_override_directives');
    }

    public function setAllowOverrideDirectives(?array $allowOverrideDirectives): self
    {
        $this->setAttribute('allow_override_directives', $allowOverrideDirectives);
        return $this;
    }

    public function getAllowOverrideOptionDirectives(): array|null
    {
        return $this->getAttribute('allow_override_option_directives');
    }

    public function setAllowOverrideOptionDirectives(?array $allowOverrideOptionDirectives): self
    {
        $this->setAttribute('allow_override_option_directives', $allowOverrideOptionDirectives);
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

    public function getPublicRoot(): string|null
    {
        return $this->getAttribute('public_root');
    }

    public function setPublicRoot(?string $publicRoot): self
    {
        $this->setAttribute('public_root', $publicRoot);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
        ))
            ->when(Arr::has($data, 'server_aliases'), fn (self $model) => $model->setServerAliases(Arr::get($data, 'server_aliases')))
            ->when(Arr::has($data, 'document_root'), fn (self $model) => $model->setDocumentRoot(Arr::get($data, 'document_root')))
            ->when(Arr::has($data, 'fpm_pool_id'), fn (self $model) => $model->setFpmPoolId(Arr::get($data, 'fpm_pool_id')))
            ->when(Arr::has($data, 'passenger_app_id'), fn (self $model) => $model->setPassengerAppId(Arr::get($data, 'passenger_app_id')))
            ->when(Arr::has($data, 'custom_config'), fn (self $model) => $model->setCustomConfig(Arr::get($data, 'custom_config')))
            ->when(Arr::has($data, 'allow_override_directives'), fn (self $model) => $model->setAllowOverrideDirectives(Arr::get($data, 'allow_override_directives')))
            ->when(Arr::has($data, 'allow_override_option_directives'), fn (self $model) => $model->setAllowOverrideOptionDirectives(Arr::get($data, 'allow_override_option_directives')))
            ->when(Arr::has($data, 'server_software_name'), fn (self $model) => $model->setServerSoftwareName(Arr::get($data, 'server_software_name') !== null ? VirtualHostServerSoftwareNameEnum::tryFrom(Arr::get($data, 'server_software_name')) : null))
            ->when(Arr::has($data, 'public_root'), fn (self $model) => $model->setPublicRoot(Arr::get($data, 'public_root')));
    }
}
