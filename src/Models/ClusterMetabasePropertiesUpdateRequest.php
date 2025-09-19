<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class ClusterMetabasePropertiesUpdateRequest extends CoreApiModel implements CoreApiModelContract
{
    public function __construct()
    {
    }

    public function getMetabaseDomain(): string|null
    {
        return $this->getAttribute('metabase_domain');
    }

    public function setMetabaseDomain(?string $metabaseDomain): self
    {
        $this->setAttribute('metabase_domain', $metabaseDomain);
        return $this;
    }

    public function getMetabaseDatabasePassword(): string|null
    {
        return $this->getAttribute('metabase_database_password');
    }

    public function setMetabaseDatabasePassword(?string $metabaseDatabasePassword): self
    {
        $this->setAttribute('metabase_database_password', $metabaseDatabasePassword);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
        ))
            ->setMetabaseDomain(Arr::get($data, 'metabase_domain'))
            ->setMetabaseDatabasePassword(Arr::get($data, 'metabase_database_password'));
    }
}
