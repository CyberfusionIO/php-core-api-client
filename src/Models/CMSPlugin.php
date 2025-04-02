<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class CMSPlugin extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(
        string $name,
        string $currentVersion,
        bool $isEnabled,
        ?string $availableVersion = null,
    ) {
        $this->setName($name);
        $this->setCurrentVersion($currentVersion);
        $this->setIsEnabled($isEnabled);
        $this->setAvailableVersion($availableVersion);
    }

    public function getName(): string
    {
        return $this->getAttribute('name');
    }

    /**
     * @throws ValidationException
     */
    public function setName(?string $name = null): self
    {
        Validator::create()
            ->length(min: 1)
            ->regex('/^[a-zA-Z0-9_]+$/')
            ->assert($name);
        $this->setAttribute('name', $name);
        return $this;
    }

    public function getCurrentVersion(): string
    {
        return $this->getAttribute('currentVersion');
    }

    /**
     * @throws ValidationException
     */
    public function setCurrentVersion(?string $currentVersion = null): self
    {
        Validator::create()
            ->length(min: 1)
            ->regex('/^[a-z0-9.-]+$/')
            ->assert($currentVersion);
        $this->setAttribute('current_version', $currentVersion);
        return $this;
    }

    public function getAvailableVersion(): string|null
    {
        return $this->getAttribute('availableVersion');
    }

    public function setAvailableVersion(?string $availableVersion = null): self
    {
        $this->setAttribute('available_version', $availableVersion);
        return $this;
    }

    public function getIsEnabled(): bool
    {
        return $this->getAttribute('isEnabled');
    }

    public function setIsEnabled(?bool $isEnabled = null): self
    {
        $this->setAttribute('is_enabled', $isEnabled);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            name: Arr::get($data, 'name'),
            currentVersion: Arr::get($data, 'current_version'),
            isEnabled: Arr::get($data, 'is_enabled'),
            availableVersion: Arr::get($data, 'available_version'),
        ));
    }
}
