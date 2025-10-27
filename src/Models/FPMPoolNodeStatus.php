<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class FPMPoolNodeStatus extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function __construct(int $nodeId, array $childStatuses, int $currentAmountChildren)
    {
        $this->setNodeId($nodeId);
        $this->setChildStatuses($childStatuses);
        $this->setCurrentAmountChildren($currentAmountChildren);
    }

    public function getNodeId(): int
    {
        return $this->getAttribute('node_id');
    }

    public function setNodeId(int $nodeId): self
    {
        $this->setAttribute('node_id', $nodeId);
        return $this;
    }

    public function getChildStatuses(): array
    {
        return $this->getAttribute('child_statuses');
    }

    public function setChildStatuses(array $childStatuses): self
    {
        $this->setAttribute('child_statuses', $childStatuses);
        return $this;
    }

    public function getCurrentAmountChildren(): int
    {
        return $this->getAttribute('current_amount_children');
    }

    public function setCurrentAmountChildren(int $currentAmountChildren): self
    {
        $this->setAttribute('current_amount_children', $currentAmountChildren);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            nodeId: Arr::get($data, 'node_id'),
            childStatuses: Arr::get($data, 'child_statuses'),
            currentAmountChildren: Arr::get($data, 'current_amount_children'),
        ));
    }
}
