<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class ClusterNodejsPropertiesCreateRequest extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(array $nodejsVersions)
    {
        $this->setNodejsVersions($nodejsVersions);
    }

    public function getNodejsVersions(): array
    {
        return $this->getAttribute('nodejs_versions');
    }

    /**
     * @throws ValidationException
     */
    public function setNodejsVersions(array $nodejsVersions = []): self
    {
        Validator::create()
            ->unique()
            ->assert($nodejsVersions);
        $this->setAttribute('nodejs_versions', $nodejsVersions);
        return $this;
    }

    public function getNodejsVersion(): int|null
    {
        return $this->getAttribute('nodejs_version');
    }

    public function setNodejsVersion(?int $nodejsVersion): self
    {
        $this->setAttribute('nodejs_version', $nodejsVersion);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            nodejsVersions: Arr::get($data, 'nodejs_versions'),
        ))
            ->setNodejsVersion(Arr::get($data, 'nodejs_version'));
    }
}
