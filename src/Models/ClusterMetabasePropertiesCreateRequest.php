<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class ClusterMetabasePropertiesCreateRequest extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function __construct(string $metabaseDomain)
    {
        $this->setMetabaseDomain($metabaseDomain);
    }

    public function getMetabaseDomain(): string
    {
        return $this->getAttribute('metabase_domain');
    }

    public function setMetabaseDomain(string $metabaseDomain): self
    {
        $this->setAttribute('metabase_domain', $metabaseDomain);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            metabaseDomain: Arr::get($data, 'metabase_domain'),
        ));
    }
}
