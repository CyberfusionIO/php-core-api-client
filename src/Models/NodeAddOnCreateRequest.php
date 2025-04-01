<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class NodeAddOnCreateRequest extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(int $nodeId, string $product, int $quantity)
    {
        $this->setNodeId($nodeId);
        $this->setProduct($product);
        $this->setQuantity($quantity);
    }

    public function getNodeId(): int
    {
        return $this->getAttribute('nodeId');
    }

    public function setNodeId(?int $nodeId = null): self
    {
        $this->setAttribute('nodeId', $nodeId);
        return $this;
    }

    public function getProduct(): string
    {
        return $this->getAttribute('product');
    }

    /**
     * @throws ValidationException
     */
    public function setProduct(?string $product = null): self
    {
        Validator::create()
            ->length(min: 1, max: 64)
            ->regex('/^[a-zA-Z0-9 ]+$/')
            ->assert($product);
        $this->setAttribute('product', $product);
        return $this;
    }

    public function getQuantity(): int
    {
        return $this->getAttribute('quantity');
    }

    public function setQuantity(?int $quantity = null): self
    {
        $this->setAttribute('quantity', $quantity);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            nodeId: Arr::get($data, 'node_id'),
            product: Arr::get($data, 'product'),
            quantity: Arr::get($data, 'quantity'),
        ));
    }
}
