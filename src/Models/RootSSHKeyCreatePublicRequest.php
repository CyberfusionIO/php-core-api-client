<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class RootSSHKeyCreatePublicRequest extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(string $name, int $clusterId, string $publicKey)
    {
        $this->setName($name);
        $this->setClusterId($clusterId);
        $this->setPublicKey($publicKey);
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
            ->length(min: 1, max: 64)
            ->regex('/^[a-zA-Z0-9-_]+$/')
            ->assert($name);
        $this->setAttribute('name', $name);
        return $this;
    }

    public function getClusterId(): int
    {
        return $this->getAttribute('clusterId');
    }

    public function setClusterId(?int $clusterId = null): self
    {
        $this->setAttribute('cluster_id', $clusterId);
        return $this;
    }

    public function getPublicKey(): string
    {
        return $this->getAttribute('publicKey');
    }

    public function setPublicKey(?string $publicKey = null): self
    {
        $this->setAttribute('public_key', $publicKey);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            name: Arr::get($data, 'name'),
            clusterId: Arr::get($data, 'cluster_id'),
            publicKey: Arr::get($data, 'public_key'),
        ));
    }
}
