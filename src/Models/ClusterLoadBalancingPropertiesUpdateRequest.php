<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Enums\LoadBalancingMethodEnum;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class ClusterLoadBalancingPropertiesUpdateRequest extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function getHttpRetryProperties(): HttpRetryProperties|null
    {
        return $this->getAttribute('http_retry_properties');
    }

    public function setHttpRetryProperties(?HttpRetryProperties $httpRetryProperties): self
    {
        $this->setAttribute('http_retry_properties', $httpRetryProperties);
        return $this;
    }

    public function getLoadBalancingMethod(): LoadBalancingMethodEnum|null
    {
        return $this->getAttribute('load_balancing_method');
    }

    public function setLoadBalancingMethod(?LoadBalancingMethodEnum $loadBalancingMethod): self
    {
        $this->setAttribute('load_balancing_method', $loadBalancingMethod);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
        ))
            ->when(Arr::has($data, 'http_retry_properties'), fn (self $model) => $model->setHttpRetryProperties(Arr::get($data, 'http_retry_properties') !== null ? HttpRetryProperties::fromArray(Arr::get($data, 'http_retry_properties')) : null))
            ->when(Arr::has($data, 'load_balancing_method'), fn (self $model) => $model->setLoadBalancingMethod(Arr::get($data, 'load_balancing_method') !== null ? LoadBalancingMethodEnum::tryFrom(Arr::get($data, 'load_balancing_method')) : null));
    }
}
