<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Enums\VirtualHostServerSoftwareNameEnum;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Cyberfusion\CoreApi\Support\ValidationHelper;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

/**
 * Properties.
 */
class VirtualHostDatabase extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(
        int $id,
        string $createdAt,
        string $updatedAt,
        int $unixUserId,
        VirtualHostServerSoftwareNameEnum $serverSoftwareName,
        string $domainRoot,
        int $clusterId,
        string $domain,
        string $publicRoot,
        string $documentRoot,
        ?array $allowOverrideDirectives = null,
        ?array $allowOverrideOptionDirectives = null,
        ?array $serverAliases = null,
        ?int $fpmPoolId = null,
        ?int $passengerAppId = null,
        ?string $customConfig = null,
    ) {
        $this->setId($id);
        $this->setCreatedAt($createdAt);
        $this->setUpdatedAt($updatedAt);
        $this->setUnixUserId($unixUserId);
        $this->setServerSoftwareName($serverSoftwareName);
        $this->setDomainRoot($domainRoot);
        $this->setClusterId($clusterId);
        $this->setDomain($domain);
        $this->setPublicRoot($publicRoot);
        $this->setDocumentRoot($documentRoot);
        $this->setAllowOverrideDirectives($allowOverrideDirectives);
        $this->setAllowOverrideOptionDirectives($allowOverrideOptionDirectives);
        $this->setServerAliases($serverAliases);
        $this->setFpmPoolId($fpmPoolId);
        $this->setPassengerAppId($passengerAppId);
        $this->setCustomConfig($customConfig);
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
        $this->setAttribute('created_at', $createdAt);
        return $this;
    }

    public function getUpdatedAt(): string
    {
        return $this->getAttribute('updatedAt');
    }

    public function setUpdatedAt(?string $updatedAt = null): self
    {
        $this->setAttribute('updated_at', $updatedAt);
        return $this;
    }

    public function getUnixUserId(): int
    {
        return $this->getAttribute('unixUserId');
    }

    public function setUnixUserId(?int $unixUserId = null): self
    {
        $this->setAttribute('unix_user_id', $unixUserId);
        return $this;
    }

    public function getServerSoftwareName(): VirtualHostServerSoftwareNameEnum
    {
        return $this->getAttribute('serverSoftwareName');
    }

    public function setServerSoftwareName(?VirtualHostServerSoftwareNameEnum $serverSoftwareName = null): self
    {
        $this->setAttribute('server_software_name', $serverSoftwareName);
        return $this;
    }

    public function getAllowOverrideDirectives(): array|null
    {
        return $this->getAttribute('allowOverrideDirectives');
    }

    public function setAllowOverrideDirectives(?array $allowOverrideDirectives = []): self
    {
        $this->setAttribute('allow_override_directives', $allowOverrideDirectives);
        return $this;
    }

    public function getAllowOverrideOptionDirectives(): array|null
    {
        return $this->getAttribute('allowOverrideOptionDirectives');
    }

    public function setAllowOverrideOptionDirectives(?array $allowOverrideOptionDirectives = []): self
    {
        $this->setAttribute('allow_override_option_directives', $allowOverrideOptionDirectives);
        return $this;
    }

    public function getDomainRoot(): string
    {
        return $this->getAttribute('domainRoot');
    }

    public function setDomainRoot(?string $domainRoot = null): self
    {
        $this->setAttribute('domain_root', $domainRoot);
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
        $this->setAttribute('public_root', $publicRoot);
        return $this;
    }

    public function getServerAliases(): array|null
    {
        return $this->getAttribute('serverAliases');
    }

    /**
     * @throws ValidationException
     */
    public function setServerAliases(?array $serverAliases = []): self
    {
        Validator::create()
            ->unique()
            ->assert(ValidationHelper::prepareArray($serverAliases));
        $this->setAttribute('server_aliases', $serverAliases);
        return $this;
    }

    public function getDocumentRoot(): string
    {
        return $this->getAttribute('documentRoot');
    }

    public function setDocumentRoot(?string $documentRoot = null): self
    {
        $this->setAttribute('document_root', $documentRoot);
        return $this;
    }

    public function getFpmPoolId(): int|null
    {
        return $this->getAttribute('fpmPoolId');
    }

    public function setFpmPoolId(?int $fpmPoolId = null): self
    {
        $this->setAttribute('fpm_pool_id', $fpmPoolId);
        return $this;
    }

    public function getPassengerAppId(): int|null
    {
        return $this->getAttribute('passengerAppId');
    }

    public function setPassengerAppId(?int $passengerAppId = null): self
    {
        $this->setAttribute('passenger_app_id', $passengerAppId);
        return $this;
    }

    public function getCustomConfig(): string|null
    {
        return $this->getAttribute('customConfig');
    }

    public function setCustomConfig(?string $customConfig = null): self
    {
        $this->setAttribute('custom_config', $customConfig);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            id: Arr::get($data, 'id'),
            createdAt: Arr::get($data, 'created_at'),
            updatedAt: Arr::get($data, 'updated_at'),
            unixUserId: Arr::get($data, 'unix_user_id'),
            serverSoftwareName: VirtualHostServerSoftwareNameEnum::tryFrom(Arr::get($data, 'server_software_name')),
            domainRoot: Arr::get($data, 'domain_root'),
            clusterId: Arr::get($data, 'cluster_id'),
            domain: Arr::get($data, 'domain'),
            publicRoot: Arr::get($data, 'public_root'),
            documentRoot: Arr::get($data, 'document_root'),
            allowOverrideDirectives: Arr::get($data, 'allow_override_directives'),
            allowOverrideOptionDirectives: Arr::get($data, 'allow_override_option_directives'),
            serverAliases: Arr::get($data, 'server_aliases'),
            fpmPoolId: Arr::get($data, 'fpm_pool_id'),
            passengerAppId: Arr::get($data, 'passenger_app_id'),
            customConfig: Arr::get($data, 'custom_config'),
        ));
    }
}
