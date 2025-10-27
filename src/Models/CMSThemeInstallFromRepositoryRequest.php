<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class CMSThemeInstallFromRepositoryRequest extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function __construct(string $name, ?string $version = null)
    {
        $this->setName($name);
        $this->setVersion($version);
    }

    public function getName(): string
    {
        return $this->getAttribute('name');
    }

    /**
     * @throws ValidationException
     */
    public function setName(string $name): self
    {
        Validator::create()
            ->length(min: 1, max: 60)
            ->regex('/^[a-zA-Z0-9-_]+$/')
            ->assert($name);
        $this->setAttribute('name', $name);
        return $this;
    }

    public function getVersion(): string|null
    {
        return $this->getAttribute('version');
    }

    public function setVersion(?string $version): self
    {
        $this->setAttribute('version', $version);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            name: Arr::get($data, 'name'),
            version: Arr::get($data, 'version'),
        ));
    }
}
