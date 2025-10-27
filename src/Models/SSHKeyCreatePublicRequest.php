<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class SSHKeyCreatePublicRequest extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

    public function __construct(string $name, int $unixUserId, string $publicKey)
    {
        $this->setName($name);
        $this->setUnixUserId($unixUserId);
        $this->setPublicKey($publicKey);
    }

    public function getName(): string
    {
        return $this->getAttribute('name');
    }

    /**
     * @throws ValidationException
     */
    public function setName(string $name): self
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
        return $this->getAttribute('unix_user_id');
    }

    public function setUnixUserId(int $unixUserId): self
    {
        $this->setAttribute('unix_user_id', $unixUserId);
        return $this;
    }

    public function getPublicKey(): string
    {
        return $this->getAttribute('public_key');
    }

    public function setPublicKey(string $publicKey): self
    {
        $this->setAttribute('public_key', $publicKey);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            name: Arr::get($data, 'name'),
            unixUserId: Arr::get($data, 'unix_user_id'),
            publicKey: Arr::get($data, 'public_key'),
        ));
    }
}
