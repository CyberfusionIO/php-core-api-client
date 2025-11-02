<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class ClusterIncludes extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function __construct(?RegionResource $region = null, ?CustomerResource $customer = null)
    {
        $this->setRegion($region);
        $this->setCustomer($customer);
    }

    public function getRegion(): RegionResource|null
    {
        return $this->getAttribute('region');
    }

    public function setRegion(?RegionResource $region): self
    {
        $this->setAttribute('region', $region);
        return $this;
    }

    public function getCustomer(): CustomerResource|null
    {
        return $this->getAttribute('customer');
    }

    public function setCustomer(?CustomerResource $customer): self
    {
        $this->setAttribute('customer', $customer);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            region: Arr::get($data, 'region') !== null ? RegionResource::fromArray(Arr::get($data, 'region')) : null,
            customer: Arr::get($data, 'customer') !== null ? CustomerResource::fromArray(Arr::get($data, 'customer')) : null,
        ));
    }
}
