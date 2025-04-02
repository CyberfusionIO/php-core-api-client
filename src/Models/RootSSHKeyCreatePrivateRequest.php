<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class RootSSHKeyCreatePrivateRequest extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(string $name, int $clusterId, string $privateKey)
    {
        $this->setName($name);
        $this->setClusterId($clusterId);
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

    public function getPrivateKey(): string
    {
        return $this->getAttribute('privateKey');
    }

    public function setPrivateKey(?string $privateKey = null): self
    {
        $this->setAttribute('private_key', $privateKey);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            name: Arr::get($data, 'name'),
            clusterId: Arr::get($data, 'cluster_id'),
            privateKey: Arr::get($data, 'private_key'),
        ));
    }
}
