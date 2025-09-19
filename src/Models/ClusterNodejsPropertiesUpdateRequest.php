<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class ClusterNodejsPropertiesUpdateRequest extends CoreApiModel implements CoreApiModelContract
{
    public function __construct()
    {
    }

    public function getNodejsVersions(): array|null
    {
        return $this->getAttribute('nodejs_versions');
    }

    public function setNodejsVersions(?array $nodejsVersions): self
    {
        $this->setAttribute('nodejs_versions', $nodejsVersions);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
        ))
            ->setNodejsVersions(Arr::get($data, 'nodejs_versions'));
    }
}
