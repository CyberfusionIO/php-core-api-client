<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class ClusterBorgSSHKey extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(string $publicKey)
    {
        $this->setPublicKey($publicKey);
    }

    public function getPublicKey(): string
    {
        return $this->getAttribute('publicKey');
    }

    public function setPublicKey(?string $publicKey = null): self
    {
        $this->setAttribute('publicKey', $publicKey);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            publicKey: Arr::get($data, 'public_key'),
        ));
    }
}
