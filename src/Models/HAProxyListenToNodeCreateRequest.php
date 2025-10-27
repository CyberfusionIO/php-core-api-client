<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class HAProxyListenToNodeCreateRequest extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function __construct(int $haproxyListenId, int $nodeId)
    {
        $this->setHaproxyListenId($haproxyListenId);
        $this->setNodeId($nodeId);
    }

    public function getHaproxyListenId(): int
    {
        return $this->getAttribute('haproxy_listen_id');
    }

    public function setHaproxyListenId(int $haproxyListenId): self
    {
        $this->setAttribute('haproxy_listen_id', $haproxyListenId);
        return $this;
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

    public static function fromArray(array $data): self
    {
        return (new self(
            haproxyListenId: Arr::get($data, 'haproxy_listen_id'),
            nodeId: Arr::get($data, 'node_id'),
        ));
    }
}
