<?php

namespace Cyberfusion\CoreApi\Models;

use Cyberfusion\CoreApi\Contracts\CoreApiModelContract;
use Cyberfusion\CoreApi\Enums\VirtualHostServerSoftwareNameEnum;
use Cyberfusion\CoreApi\Support\CoreApiModel;
use Illuminate\Support\Arr;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator;

class CustomConfigSnippetResource extends CoreApiModel implements CoreApiModelContract
{
    public function __construct(
        int $id,
        string $createdAt,
        string $updatedAt,
        string $name,
        VirtualHostServerSoftwareNameEnum $serverSoftwareName,
        string $contents,
        int $clusterId,
        bool $isDefault,
    ) {
        $this->setId($id);
        $this->setCreatedAt($createdAt);
        $this->setUpdatedAt($updatedAt);
        $this->setName($name);
        $this->setServerSoftwareName($serverSoftwareName);
        $this->setContents($contents);
        $this->setClusterId($clusterId);
        $this->setIsDefault($isDefault);
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

    public function getCreatedAt(): string
    {
        return $this->getAttribute('createdAt');
    }

    public function setCreatedAt(?string $createdAt = null): self
    {
        $this->setAttribute('created_at', $createdAt);
        return $this;
    }

    public function getUpdatedAt(): string
    {
        return $this->getAttribute('updatedAt');
    }

    public function setUpdatedAt(?string $updatedAt = null): self
    {
        $this->setAttribute('updated_at', $updatedAt);
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
            ->length(min: 1, max: 128)
            ->regex('/^[a-z0-9-_]+$/')
            ->assert($name);
        $this->setAttribute('name', $name);
        return $this;
    }

    public function getServerSoftwareName(): VirtualHostServerSoftwareNameEnum
    {
        return $this->getAttribute('serverSoftwareName');
    }

    public function setServerSoftwareName(?VirtualHostServerSoftwareNameEnum $serverSoftwareName = null): self
    {
        $this->setAttribute('server_software_name', $serverSoftwareName);
        return $this;
    }

    public function getContents(): string
    {
        return $this->getAttribute('contents');
    }

    /**
     * @throws ValidationException
     */
    public function setContents(?string $contents = null): self
    {
        Validator::create()
            ->length(min: 1, max: 65535)
            ->regex('/^[ -~\n]+$/')
            ->assert($contents);
        $this->setAttribute('contents', $contents);
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

    public function getIsDefault(): bool
    {
        return $this->getAttribute('isDefault');
    }

    public function setIsDefault(?bool $isDefault = null): self
    {
        $this->setAttribute('is_default', $isDefault);
        return $this;
    }

    public static function fromArray(array $data): self
    {
        return (new self(
            id: Arr::get($data, 'id'),
            createdAt: Arr::get($data, 'created_at'),
            updatedAt: Arr::get($data, 'updated_at'),
            name: Arr::get($data, 'name'),
            serverSoftwareName: VirtualHostServerSoftwareNameEnum::tryFrom(Arr::get($data, 'server_software_name')),
            contents: Arr::get($data, 'contents'),
            clusterId: Arr::get($data, 'cluster_id'),
            isDefault: Arr::get($data, 'is_default'),
        ));
    }
}
