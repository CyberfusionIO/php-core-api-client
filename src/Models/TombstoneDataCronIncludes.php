<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class TombstoneDataCronIncludes extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function __construct(NodeResource $node, UNIXUserResource|TombstoneDataUNIXUser $unixUser)
    {
        $this->setNode($node);
        $this->setUnixUser($unixUser);
    }

    public function getNode(): NodeResource
    {
        return $this->getAttribute('node');
    }

    public function setNode(NodeResource $node): self
    {
        $this->setAttribute('node', $node);
        return $this;
    }

    public function getUnixUser(): UNIXUserResource|TombstoneDataUNIXUser
    {
        return $this->getAttribute('unix_user');
    }

    public function setUnixUser(UNIXUserResource|TombstoneDataUNIXUser $unixUser): self
    {
        $this->setAttribute('unix_user', $unixUser);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            node: NodeResource::fromArray(Arr::get($data, 'node')),
            unixUser: UNIXUserResource::fromArray(Arr::get($data, 'unix_user')),
        ));
    }
}
