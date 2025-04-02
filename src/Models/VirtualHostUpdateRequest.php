<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Enums\VirtualHostServerSoftwareNameEnum;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Cyberfusion\CoreApi\Support\ValidationHelper;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class VirtualHostUpdateRequest extends CoreApiModel implements CoreApiModelContract
{
    public function __construct()
    {
    }

    public function getServerAliases(): array|null
    {
        return $this->getAttribute('serverAliases');
    }

    /**
     * @throws ValidationException
     */
    public function setServerAliases(?array $serverAliases): self
    {
        Validator::optional(Validator::create()
            ->unique())
            ->assert(ValidationHelper::prepareArray($serverAliases));
        $this->setAttribute('server_aliases', $serverAliases);
        return $this;
    }

    public function getDocumentRoot(): string
    {
        return $this->getAttribute('documentRoot');
    }

    public function setDocumentRoot(string $documentRoot): self
    {
        $this->setAttribute('document_root', $documentRoot);
        return $this;
    }

    public function getFpmPoolId(): int|null
    {
        return $this->getAttribute('fpmPoolId');
    }

    public function setFpmPoolId(?int $fpmPoolId): self
    {
        $this->setAttribute('fpm_pool_id', $fpmPoolId);
        return $this;
    }

    public function getPassengerAppId(): int|null
    {
        return $this->getAttribute('passengerAppId');
    }

    public function setPassengerAppId(?int $passengerAppId): self
    {
        $this->setAttribute('passenger_app_id', $passengerAppId);
        return $this;
    }

    public function getCustomConfig(): string|null
    {
        return $this->getAttribute('customConfig');
    }

    public function setCustomConfig(?string $customConfig): self
    {
        $this->setAttribute('custom_config', $customConfig);
        return $this;
    }

    public function getAllowOverrideDirectives(): array|null
    {
        return $this->getAttribute('allowOverrideDirectives');
    }

    public function setAllowOverrideDirectives(?array $allowOverrideDirectives): self
    {
        $this->setAttribute('allow_override_directives', $allowOverrideDirectives);
        return $this;
    }

    public function getAllowOverrideOptionDirectives(): array|null
    {
        return $this->getAttribute('allowOverrideOptionDirectives');
    }

    public function setAllowOverrideOptionDirectives(?array $allowOverrideOptionDirectives): self
    {
        $this->setAttribute('allow_override_option_directives', $allowOverrideOptionDirectives);
        return $this;
    }

    public function getServerSoftwareName(): VirtualHostServerSoftwareNameEnum|null
    {
        return $this->getAttribute('serverSoftwareName');
    }

    public function setServerSoftwareName(?VirtualHostServerSoftwareNameEnum $serverSoftwareName): self
    {
        $this->setAttribute('server_software_name', $serverSoftwareName);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
        ))
            ->setServerAliases(Arr::get($data, 'server_aliases'))
            ->setDocumentRoot(Arr::get($data, 'document_root'))
            ->setFpmPoolId(Arr::get($data, 'fpm_pool_id'))
            ->setPassengerAppId(Arr::get($data, 'passenger_app_id'))
            ->setCustomConfig(Arr::get($data, 'custom_config'))
            ->setAllowOverrideDirectives(Arr::get($data, 'allow_override_directives'))
            ->setAllowOverrideOptionDirectives(Arr::get($data, 'allow_override_option_directives'))
            ->setServerSoftwareName(Arr::get($data, 'server_software_name'));
    }
}
