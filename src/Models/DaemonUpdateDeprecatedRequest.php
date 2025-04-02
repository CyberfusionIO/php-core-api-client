<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Cyberfusion\CoreApi\Support\ValidationHelper;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class DaemonUpdateDeprecatedRequest extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(int $id, int $clusterId, string $name, int $unixUserId, string $command)
    {
        $this->setId($id);
        $this->setClusterId($clusterId);
        $this->setName($name);
        $this->setUnixUserId($unixUserId);
        $this->setCommand($command);
    }

    public function getId(): int
    {
        return $this->getAttribute('id');
    }

    public function setId(?int $id = null): self
    {
        $this->setAttribute('id', $id);
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
            ->regex('/^[a-z0-9-_]+$/')
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
        $this->setAttribute('unix_user_id', $unixUserId);
        return $this;
    }

    public function getCommand(): string
    {
        return $this->getAttribute('command');
    }

    /**
     * @throws ValidationException
     */
    public function setCommand(?string $command = null): self
    {
        Validator::create()
            ->length(min: 1, max: 65535)
            ->regex('/^[ -~]+$/')
            ->assert($command);
        $this->setAttribute('command', $command);
        return $this;
    }

    public function getNodesIds(): array
    {
        return $this->getAttribute('nodesIds');
    }

    /**
     * @throws ValidationException
     */
    public function setNodesIds(array $nodesIds): self
    {
        Validator::optional(Validator::create()
            ->unique())
            ->assert(ValidationHelper::prepareArray($nodesIds));
        $this->setAttribute('nodes_ids', $nodesIds);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            id: Arr::get($data, 'id'),
            clusterId: Arr::get($data, 'cluster_id'),
            name: Arr::get($data, 'name'),
            unixUserId: Arr::get($data, 'unix_user_id'),
            command: Arr::get($data, 'command'),
        ))
            ->setNodesIds(Arr::get($data, 'nodes_ids'));
    }
}
