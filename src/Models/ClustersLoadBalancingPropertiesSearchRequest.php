<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Enums\LoadBalancingMethodEnum;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class ClustersLoadBalancingPropertiesSearchRequest extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function getHttpRetryProperties(): HTTPRetryProperties|null
    {
        return $this->getAttribute('http_retry_properties');
    }

    public function setHttpRetryProperties(?HTTPRetryProperties $httpRetryProperties): self
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

    public function getClusterId(): int|null
    {
        return $this->getAttribute('cluster_id');
    }

    public function setClusterId(?int $clusterId): self
    {
        $this->setAttribute('cluster_id', $clusterId);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
        ))
            ->when(Arr::has($data, 'http_retry_properties'), fn (self $model) => $model->setHttpRetryProperties(Arr::get($data, 'http_retry_properties') !== null ? HTTPRetryProperties::fromArray(Arr::get($data, 'http_retry_properties')) : null))
            ->when(Arr::has($data, 'load_balancing_method'), fn (self $model) => $model->setLoadBalancingMethod(Arr::get($data, 'load_balancing_method') !== null ? LoadBalancingMethodEnum::tryFrom(Arr::get($data, 'load_balancing_method')) : null))
            ->when(Arr::has($data, 'cluster_id'), fn (self $model) => $model->setClusterId(Arr::get($data, 'cluster_id')));
    }
}
