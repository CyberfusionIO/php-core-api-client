<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Enums\VirtualHostServerSoftwareNameEnum;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Cyberfusion\CoreApi\Support\ValidationHelper;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class VirtualHostCreateRequest extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(
        string $domain,
        string $publicRoot,
        int $unixUserId,
        string $documentRoot,
        ?VirtualHostServerSoftwareNameEnum $serverSoftwareName = null,
        ?array $allowOverrideDirectives = null,
        ?array $allowOverrideOptionDirectives = null,
        ?int $fpmPoolId = null,
        ?int $passengerAppId = null,
        ?string $customConfig = null,
    ) {
        $this->setDomain($domain);
        $this->setPublicRoot($publicRoot);
        $this->setUnixUserId($unixUserId);
        $this->setDocumentRoot($documentRoot);
        $this->setServerSoftwareName($serverSoftwareName);
        $this->setAllowOverrideDirectives($allowOverrideDirectives);
        $this->setAllowOverrideOptionDirectives($allowOverrideOptionDirectives);
        $this->setFpmPoolId($fpmPoolId);
        $this->setPassengerAppId($passengerAppId);
        $this->setCustomConfig($customConfig);
    }

    public function getServerSoftwareName(): VirtualHostServerSoftwareNameEnum|null
    {
        return $this->getAttribute('serverSoftwareName');
    }

    public function setServerSoftwareName(?VirtualHostServerSoftwareNameEnum $serverSoftwareName = null): self
    {
        $this->setAttribute('serverSoftwareName', $serverSoftwareName);
        return $this;
    }

    public function getAllowOverrideDirectives(): array|null
    {
        return $this->getAttribute('allowOverrideDirectives');
    }

    public function setAllowOverrideDirectives(?array $allowOverrideDirectives = []): self
    {
        $this->setAttribute('allowOverrideDirectives', $allowOverrideDirectives);
        return $this;
    }

    public function getAllowOverrideOptionDirectives(): array|null
    {
        return $this->getAttribute('allowOverrideOptionDirectives');
    }

    public function setAllowOverrideOptionDirectives(?array $allowOverrideOptionDirectives = []): self
    {
        $this->setAttribute('allowOverrideOptionDirectives', $allowOverrideOptionDirectives);
        return $this;
    }

    public function getDomain(): string
    {
        return $this->getAttribute('domain');
    }

    public function setDomain(?string $domain = null): self
    {
        $this->setAttribute('domain', $domain);
        return $this;
    }

    public function getPublicRoot(): string
    {
        return $this->getAttribute('publicRoot');
    }

    public function setPublicRoot(?string $publicRoot = null): self
    {
        $this->setAttribute('publicRoot', $publicRoot);
        return $this;
    }

    public function getUnixUserId(): int
    {
        return $this->getAttribute('unixUserId');
    }

    public function setUnixUserId(?int $unixUserId = null): self
    {
        $this->setAttribute('unixUserId', $unixUserId);
        return $this;
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
        $this->setAttribute('serverAliases', $serverAliases);
        return $this;
    }

    public function getDocumentRoot(): string
    {
        return $this->getAttribute('documentRoot');
    }

    public function setDocumentRoot(?string $documentRoot = null): self
    {
        $this->setAttribute('documentRoot', $documentRoot);
        return $this;
    }

    public function getFpmPoolId(): int|null
    {
        return $this->getAttribute('fpmPoolId');
    }

    public function setFpmPoolId(?int $fpmPoolId = null): self
    {
        $this->setAttribute('fpmPoolId', $fpmPoolId);
        return $this;
    }

    public function getPassengerAppId(): int|null
    {
        return $this->getAttribute('passengerAppId');
    }

    public function setPassengerAppId(?int $passengerAppId = null): self
    {
        $this->setAttribute('passengerAppId', $passengerAppId);
        return $this;
    }

    public function getCustomConfig(): string|null
    {
        return $this->getAttribute('customConfig');
    }

    public function setCustomConfig(?string $customConfig = null): self
    {
        $this->setAttribute('customConfig', $customConfig);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            domain: Arr::get($data, 'domain'),
            publicRoot: Arr::get($data, 'public_root'),
            unixUserId: Arr::get($data, 'unix_user_id'),
            documentRoot: Arr::get($data, 'document_root'),
            serverSoftwareName: Arr::get($data, 'server_software_name') !== null ? VirtualHostServerSoftwareNameEnum::tryFrom(Arr::get($data, 'server_software_name')) : null,
            allowOverrideDirectives: Arr::get($data, 'allow_override_directives'),
            allowOverrideOptionDirectives: Arr::get($data, 'allow_override_option_directives'),
            fpmPoolId: Arr::get($data, 'fpm_pool_id'),
            passengerAppId: Arr::get($data, 'passenger_app_id'),
            customConfig: Arr::get($data, 'custom_config'),
        ))
            ->setServerAliases(Arr::get($data, 'server_aliases'));
    }
}
