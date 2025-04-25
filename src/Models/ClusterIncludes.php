<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class ClusterIncludes extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(SiteResource $site, CustomerResource $customer)
    {
        $this->setSite($site);
        $this->setCustomer($customer);
    }

    public function getSite(): SiteResource
    {
        return $this->getAttribute('site');
    }

    public function setSite(?SiteResource $site = null): self
    {
        $this->setAttribute('site', $site);
        return $this;
    }

    public function getCustomer(): CustomerResource
    {
        return $this->getAttribute('customer');
    }

    public function setCustomer(?CustomerResource $customer = null): self
    {
        $this->setAttribute('customer', $customer);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            site: SiteResource::fromArray(Arr::get($data, 'site')),
            customer: CustomerResource::fromArray(Arr::get($data, 'customer')),
        ));
    }
}
