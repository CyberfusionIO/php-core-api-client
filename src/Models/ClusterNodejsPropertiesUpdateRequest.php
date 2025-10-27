<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class ClusterNodejsPropertiesUpdateRequest extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

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
            ->when(Arr::has($data, 'nodejs_versions'), fn (self $model) => $model->setNodejsVersions(Arr::get($data, 'nodejs_versions')));
    }
}
