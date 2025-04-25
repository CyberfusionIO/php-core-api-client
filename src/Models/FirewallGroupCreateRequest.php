<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Cyberfusion\CoreApi\Support\ValidationHelper;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class FirewallGroupCreateRequest extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(string $name, int $clusterId, array $ipNetworks)
    {
        $this->setName($name);
        $this->setClusterId($clusterId);
        $this->setIpNetworks($ipNetworks);
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
            ->length(min: 1, max: 32)
            ->regex('/^[a-z0-9_]+$/')
            ->assert($name);
        $this->setAttribute('name', $name);
        return $this;
    }

    public function getClusterId(): int
    {
        return $this->getAttribute('cluster_id');
    }

    public function setClusterId(?int $clusterId = null): self
    {
        $this->setAttribute('cluster_id', $clusterId);
        return $this;
    }

    public function getIpNetworks(): array
    {
        return $this->getAttribute('ip_networks');
    }

    /**
     * @throws ValidationException
     */
    public function setIpNetworks(array $ipNetworks = []): self
    {
        Validator::create()
            ->unique()
            ->assert(ValidationHelper::prepareArray($ipNetworks));
        $this->setAttribute('ip_networks', $ipNetworks);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            name: Arr::get($data, 'name'),
            clusterId: Arr::get($data, 'cluster_id'),
            ipNetworks: Arr::get($data, 'ip_networks'),
        ));
    }
}
