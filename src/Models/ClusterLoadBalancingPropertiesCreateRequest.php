<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Enums\LoadBalancingMethodEnum;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class ClusterLoadBalancingPropertiesCreateRequest extends CoreApiModel implements CoreApiModelContract
{
    public function __construct()
    {
    }

    public function getHttpRetryProperties(): HTTPRetryProperties
    {
        return $this->getAttribute('http_retry_properties');
    }

    public function setHttpRetryProperties(HTTPRetryProperties $httpRetryProperties): self
    {
        $this->setAttribute('http_retry_properties', $httpRetryProperties);
        return $this;
    }

    public function getLoadBalancingMethod(): LoadBalancingMethodEnum
    {
        return $this->getAttribute('load_balancing_method');
    }

    public function setLoadBalancingMethod(LoadBalancingMethodEnum $loadBalancingMethod): self
    {
        $this->setAttribute('load_balancing_method', $loadBalancingMethod);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
        ))
            ->setHttpRetryProperties(HTTPRetryProperties::fromArray(Arr::get($data, 'http_retry_properties', [ 'conditions' => [],])))
            ->setLoadBalancingMethod(LoadBalancingMethodEnum::tryFrom(Arr::get($data, 'load_balancing_method', 'Round Robin')));
    }
}
