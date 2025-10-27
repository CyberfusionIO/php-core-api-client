<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class NodeAddOnsSearchRequest extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function getClusterId(): int|null
    {
        return $this->getAttribute('cluster_id');
    }

    public function setClusterId(?int $clusterId): self
    {
        $this->setAttribute('cluster_id', $clusterId);
        return $this;
    }

    public function getNodeId(): int|null
    {
        return $this->getAttribute('node_id');
    }

    public function setNodeId(?int $nodeId): self
    {
        $this->setAttribute('node_id', $nodeId);
        return $this;
    }

    public function getProduct(): string|null
    {
        return $this->getAttribute('product');
    }

    public function setProduct(?string $product): self
    {
        $this->setAttribute('product', $product);
        return $this;
    }

    public function getQuantity(): int|null
    {
        return $this->getAttribute('quantity');
    }

    public function setQuantity(?int $quantity): self
    {
        $this->setAttribute('quantity', $quantity);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
        ))
            ->when(Arr::has($data, 'cluster_id'), fn (self $model) => $model->setClusterId(Arr::get($data, 'cluster_id')))
            ->when(Arr::has($data, 'node_id'), fn (self $model) => $model->setNodeId(Arr::get($data, 'node_id')))
            ->when(Arr::has($data, 'product'), fn (self $model) => $model->setProduct(Arr::get($data, 'product')))
            ->when(Arr::has($data, 'quantity'), fn (self $model) => $model->setQuantity(Arr::get($data, 'quantity')));
    }
}
