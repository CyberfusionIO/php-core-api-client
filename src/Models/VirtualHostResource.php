<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Enums\VirtualHostServerSoftwareNameEnum;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class VirtualHostResource extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

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
        array $serverAliases,
        string $documentRoot,
        VirtualHostIncludes $includes,
        ?array $allowOverrideDirectives = null,
        ?array $allowOverrideOptionDirectives = null,
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
        $this->setServerAliases($serverAliases);
        $this->setDocumentRoot($documentRoot);
        $this->setIncludes($includes);
        $this->setAllowOverrideDirectives($allowOverrideDirectives);
        $this->setAllowOverrideOptionDirectives($allowOverrideOptionDirectives);
        $this->setFpmPoolId($fpmPoolId);
        $this->setPassengerAppId($passengerAppId);
        $this->setCustomConfig($customConfig);
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

    public function getUnixUserId(): int
    {
        return $this->getAttribute('unix_user_id');
    }

    public function setUnixUserId(int $unixUserId): self
    {
        $this->setAttribute('unix_user_id', $unixUserId);
        return $this;
    }

    public function getServerSoftwareName(): VirtualHostServerSoftwareNameEnum
    {
        return $this->getAttribute('server_software_name');
    }

    public function setServerSoftwareName(VirtualHostServerSoftwareNameEnum $serverSoftwareName): self
    {
        $this->setAttribute('server_software_name', $serverSoftwareName);
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

    public function getDomainRoot(): string
    {
        return $this->getAttribute('domain_root');
    }

    public function setDomainRoot(string $domainRoot): self
    {
        $this->setAttribute('domain_root', $domainRoot);
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

    public function getDomain(): string
    {
        return $this->getAttribute('domain');
    }

    public function setDomain(string $domain): self
    {
        $this->setAttribute('domain', $domain);
        return $this;
    }

    public function getPublicRoot(): string
    {
        return $this->getAttribute('public_root');
    }

    public function setPublicRoot(string $publicRoot): self
    {
        $this->setAttribute('public_root', $publicRoot);
        return $this;
    }

    public function getServerAliases(): array
    {
        return $this->getAttribute('server_aliases');
    }

    /**
     * @throws ValidationException
     */
    public function setServerAliases(array $serverAliases): self
    {
        Validator::create()
            ->unique()
            ->assert($serverAliases);
        $this->setAttribute('server_aliases', $serverAliases);
        return $this;
    }

    public function getDocumentRoot(): string
    {
        return $this->getAttribute('document_root');
    }

    public function setDocumentRoot(string $documentRoot): self
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

    public function getIncludes(): VirtualHostIncludes
    {
        return $this->getAttribute('includes');
    }

    public function setIncludes(VirtualHostIncludes $includes): self
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
            unixUserId: Arr::get($data, 'unix_user_id'),
            serverSoftwareName: VirtualHostServerSoftwareNameEnum::tryFrom(Arr::get($data, 'server_software_name')),
            domainRoot: Arr::get($data, 'domain_root'),
            clusterId: Arr::get($data, 'cluster_id'),
            domain: Arr::get($data, 'domain'),
            publicRoot: Arr::get($data, 'public_root'),
            serverAliases: Arr::get($data, 'server_aliases'),
            documentRoot: Arr::get($data, 'document_root'),
            includes: VirtualHostIncludes::fromArray(Arr::get($data, 'includes')),
            allowOverrideDirectives: Arr::get($data, 'allow_override_directives'),
            allowOverrideOptionDirectives: Arr::get($data, 'allow_override_option_directives'),
            fpmPoolId: Arr::get($data, 'fpm_pool_id'),
            passengerAppId: Arr::get($data, 'passenger_app_id'),
            customConfig: Arr::get($data, 'custom_config'),
        ));
    }
}
