<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class HAProxyListenToNodeCreateRequest extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(int $haproxyListenId, int $nodeId)
    {
        $this->setHaproxyListenId($haproxyListenId);
        $this->setNodeId($nodeId);
    }

    public function getHaproxyListenId(): int
    {
        return $this->getAttribute('haproxyListenId');
    }

    public function setHaproxyListenId(?int $haproxyListenId = null): self
    {
        $this->setAttribute('haproxyListenId', $haproxyListenId);
        return $this;
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

    public static function fromArray(array $data): self
    {
        return (new self(
            haproxyListenId: Arr::get($data, 'haproxy_listen_id'),
            nodeId: Arr::get($data, 'node_id'),
        ));
    }
}
