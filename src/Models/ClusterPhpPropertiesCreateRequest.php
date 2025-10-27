<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class ClusterPhpPropertiesCreateRequest extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function __construct(array $phpVersions, array $customPhpModulesNames, PHPSettings $phpSettings)
    {
        $this->setPhpVersions($phpVersions);
        $this->setCustomPhpModulesNames($customPhpModulesNames);
        $this->setPhpSettings($phpSettings);
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

    public static function fromArray(array $data): self
    {
        return (new self(
            phpVersions: Arr::get($data, 'php_versions'),
            customPhpModulesNames: Arr::get($data, 'custom_php_modules_names'),
            phpSettings: PHPSettings::fromArray(Arr::get($data, 'php_settings')),
        ))
            ->when(Arr::has($data, 'php_ioncube_enabled'), fn (self $model) => $model->setPhpIoncubeEnabled(Arr::get($data, 'php_ioncube_enabled', false)))
            ->when(Arr::has($data, 'php_sessions_spread_enabled'), fn (self $model) => $model->setPhpSessionsSpreadEnabled(Arr::get($data, 'php_sessions_spread_enabled', true)));
    }
}
