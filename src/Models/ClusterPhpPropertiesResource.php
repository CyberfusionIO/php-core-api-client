<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class ClusterPhpPropertiesResource extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function __construct(
        int $id,
        string $createdAt,
        string $updatedAt,
        array $phpVersions,
        array $customPhpModulesNames,
        PHPSettings $phpSettings,
        bool $phpIoncubeEnabled,
        bool $phpSessionsSpreadEnabled,
        int $clusterId,
        ClusterPhpPropertiesIncludes $includes,
    ) {
        $this->setId($id);
        $this->setCreatedAt($createdAt);
        $this->setUpdatedAt($updatedAt);
        $this->setPhpVersions($phpVersions);
        $this->setCustomPhpModulesNames($customPhpModulesNames);
        $this->setPhpSettings($phpSettings);
        $this->setPhpIoncubeEnabled($phpIoncubeEnabled);
        $this->setPhpSessionsSpreadEnabled($phpSessionsSpreadEnabled);
        $this->setClusterId($clusterId);
        $this->setIncludes($includes);
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

    public function getPhpVersions(): array
    {
        return $this->getAttribute('php_versions');
    }

    /**
     * @throws ValidationException
     */
    public function setPhpVersions(array $phpVersions): self
    {
        Validator::create()
            ->unique()
            ->assert($phpVersions);
        $this->setAttribute('php_versions', $phpVersions);
        return $this;
    }

    public function getCustomPhpModulesNames(): array
    {
        return $this->getAttribute('custom_php_modules_names');
    }

    /**
     * @throws ValidationException
     */
    public function setCustomPhpModulesNames(array $customPhpModulesNames): self
    {
        Validator::create()
            ->unique()
            ->assert($customPhpModulesNames);
        $this->setAttribute('custom_php_modules_names', $customPhpModulesNames);
        return $this;
    }

    public function getPhpSettings(): PHPSettings
    {
        return $this->getAttribute('php_settings');
    }

    public function setPhpSettings(PHPSettings $phpSettings): self
    {
        $this->setAttribute('php_settings', $phpSettings);
        return $this;
    }

    public function getPhpIoncubeEnabled(): bool
    {
        return $this->getAttribute('php_ioncube_enabled');
    }

    public function setPhpIoncubeEnabled(bool $phpIoncubeEnabled): self
    {
        $this->setAttribute('php_ioncube_enabled', $phpIoncubeEnabled);
        return $this;
    }

    public function getPhpSessionsSpreadEnabled(): bool
    {
        return $this->getAttribute('php_sessions_spread_enabled');
    }

    public function setPhpSessionsSpreadEnabled(bool $phpSessionsSpreadEnabled): self
    {
        $this->setAttribute('php_sessions_spread_enabled', $phpSessionsSpreadEnabled);
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

    public function getIncludes(): ClusterPhpPropertiesIncludes
    {
        return $this->getAttribute('includes');
    }

    public function setIncludes(ClusterPhpPropertiesIncludes $includes): self
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
            phpVersions: Arr::get($data, 'php_versions'),
            customPhpModulesNames: Arr::get($data, 'custom_php_modules_names'),
            phpSettings: PHPSettings::fromArray(Arr::get($data, 'php_settings')),
            phpIoncubeEnabled: Arr::get($data, 'php_ioncube_enabled'),
            phpSessionsSpreadEnabled: Arr::get($data, 'php_sessions_spread_enabled'),
            clusterId: Arr::get($data, 'cluster_id'),
            includes: ClusterPhpPropertiesIncludes::fromArray(Arr::get($data, 'includes')),
        ));
    }
}
