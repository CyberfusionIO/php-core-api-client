<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Conditionable;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class RootSshKeyCreatePrivateRequest extends CoreApiModel implements CoreApiModelContract
{
    use Conditionable;

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
    public function setName(string $name): self
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
        return $this->getAttribute('cluster_id');
    }

    public function setClusterId(int $clusterId): self
    {
        $this->setAttribute('cluster_id', $clusterId);
        return $this;
    }

    public function getPrivateKey(): string
    {
        return $this->getAttribute('private_key');
    }

    public function setPrivateKey(string $privateKey): self
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
