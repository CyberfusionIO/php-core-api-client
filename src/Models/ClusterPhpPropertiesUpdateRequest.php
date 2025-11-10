<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class ClusterPhpPropertiesUpdateRequest extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function getPhpVersions(): array|null
    {
        return $this->getAttribute('php_versions');
    }

    public function setPhpVersions(?array $phpVersions): self
    {
        $this->setAttribute('php_versions', $phpVersions);
        return $this;
    }

    public function getCustomPhpModulesNames(): array|null
    {
        return $this->getAttribute('custom_php_modules_names');
    }

    public function setCustomPhpModulesNames(?array $customPhpModulesNames): self
    {
        $this->setAttribute('custom_php_modules_names', $customPhpModulesNames);
        return $this;
    }

    public function getPhpSettings(): PhpSettings|null
    {
        return $this->getAttribute('php_settings');
    }

    public function setPhpSettings(?PhpSettings $phpSettings): self
    {
        $this->setAttribute('php_settings', $phpSettings);
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

    public static function fromArray(array $data): self
    {
        return (new self(
        ))
            ->when(Arr::has($data, 'php_versions'), fn (self $model) => $model->setPhpVersions(Arr::get($data, 'php_versions')))
            ->when(Arr::has($data, 'custom_php_modules_names'), fn (self $model) => $model->setCustomPhpModulesNames(Arr::get($data, 'custom_php_modules_names')))
            ->when(Arr::has($data, 'php_settings'), fn (self $model) => $model->setPhpSettings(Arr::get($data, 'php_settings') !== null ? PhpSettings::fromArray(Arr::get($data, 'php_settings')) : null))
            ->when(Arr::has($data, 'php_ioncube_enabled'), fn (self $model) => $model->setPhpIoncubeEnabled(Arr::get($data, 'php_ioncube_enabled')))
            ->when(Arr::has($data, 'php_sessions_spread_enabled'), fn (self $model) => $model->setPhpSessionsSpreadEnabled(Arr::get($data, 'php_sessions_spread_enabled')));
    }
}
