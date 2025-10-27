<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class ObjectLogIncludes extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function __construct(?CustomerResource $customer = null)
    {
        $this->setCustomer($customer);
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
            customer: Arr::get($data, 'customer') !== null ? CustomerResource::fromArray(Arr::get($data, 'customer')) : null,
        ));
    }
}
