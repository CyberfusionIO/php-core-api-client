<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Enums\PHPExtensionEnum;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class ClustersPhpPropertiesSearchRequest extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function getPhpVersions(): string|null
    {
        return $this->getAttribute('php_versions');
    }

    public function setPhpVersions(?string $phpVersions): self
    {
        $this->setAttribute('php_versions', $phpVersions);
        return $this;
    }

    public function getCustomPhpModulesNames(): PHPExtensionEnum|null
    {
        return $this->getAttribute('custom_php_modules_names');
    }

    public function setCustomPhpModulesNames(?PHPExtensionEnum $customPhpModulesNames): self
    {
        $this->setAttribute('custom_php_modules_names', $customPhpModulesNames);
        return $this;
    }

    public function getPhpIoncubeEnabled(): bool|null
    {
        return $this->getAttribute('php_ioncube_enabled');
    }

    public function setPhpIoncubeEnabled(?bool $phpIoncubeEnabled): self
    {
        $this->setAttribute('php_ioncube_enabled', $phpIoncubeEnabled);
        return $this;
    }

    public function getPhpSessionsSpreadEnabled(): bool|null
    {
        return $this->getAttribute('php_sessions_spread_enabled');
    }

    public function setPhpSessionsSpreadEnabled(?bool $phpSessionsSpreadEnabled): self
    {
        $this->setAttribute('php_sessions_spread_enabled', $phpSessionsSpreadEnabled);
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
            ->when(Arr::has($data, 'php_versions'), fn (self $model) => $model->setPhpVersions(Arr::get($data, 'php_versions')))
            ->when(Arr::has($data, 'custom_php_modules_names'), fn (self $model) => $model->setCustomPhpModulesNames(Arr::get($data, 'custom_php_modules_names') !== null ? PHPExtensionEnum::tryFrom(Arr::get($data, 'custom_php_modules_names')) : null))
            ->when(Arr::has($data, 'php_ioncube_enabled'), fn (self $model) => $model->setPhpIoncubeEnabled(Arr::get($data, 'php_ioncube_enabled')))
            ->when(Arr::has($data, 'php_sessions_spread_enabled'), fn (self $model) => $model->setPhpSessionsSpreadEnabled(Arr::get($data, 'php_sessions_spread_enabled')))
            ->when(Arr::has($data, 'cluster_id'), fn (self $model) => $model->setClusterId(Arr::get($data, 'cluster_id')));
    }
}
