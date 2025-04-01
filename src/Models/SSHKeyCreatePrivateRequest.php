<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class SSHKeyCreatePrivateRequest extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(string $name, int $unixUserId, string $privateKey)
    {
        $this->setName($name);
        $this->setUnixUserId($unixUserId);
        $this->setPrivateKey($privateKey);
    }

    public function getName(): string
    {
        return $this->getAttribute('name');
    }

    /**
     * @throws ValidationException
     */
    public function setName(?string $name = null): self
    {
        Validator::create()
            ->length(min: 1, max: 128)
            ->regex('/^[a-zA-Z0-9-_]+$/')
            ->assert($name);
        $this->setAttribute('name', $name);
        return $this;
    }

    public function getUnixUserId(): int
    {
        return $this->getAttribute('unixUserId');
    }

    public function setUnixUserId(?int $unixUserId = null): self
    {
        $this->setAttribute('unixUserId', $unixUserId);
        return $this;
    }

    public function getPrivateKey(): string
    {
        return $this->getAttribute('privateKey');
    }

    public function setPrivateKey(?string $privateKey = null): self
    {
        $this->setAttribute('privateKey', $privateKey);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            name: Arr::get($data, 'name'),
            unixUserId: Arr::get($data, 'unix_user_id'),
            privateKey: Arr::get($data, 'private_key'),
        ));
    }
}
